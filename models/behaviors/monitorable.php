<?php
/**
 * MonitorableBehavior
 * created: 03.06.2009 / 12:24:03
 *
 * PHP Version 5
 *
 * @category	behaviors
 * @package		biz.lubico.cake.monitoring
 * @version		v1.0.0
 * @since		v1.0.0
 * @author		Sven Aßmann <sven.assmann@lubico.biz>
 * @licence		MIT
 * @link		http://www.lubico.biz
 * @copyright	Copyright (C) 2006 - 2011,  Lubico Business, Sven Aßmann <sven.assmann@lubico.biz>
 *
 */	
class MonitorableBehavior extends ModelBehavior {

	/**
	 * @param mixed $config
	 * @return void
	 * @access public
	 */
	function setup(&$Model, $settings = array()) {
		if (!isset($this->settings[$Model->alias])) {
			$this->settings[$Model->alias] = array(
				'model' => $Model->name,
				'type' => 'download',
				'ip' => env('REMOTE_ADDR'),
				'user_agent' => env('HTTP_USER_AGENT')
			);
		}
		$this->settings[$Model->alias] = array_merge(
			$this->settings[$Model->alias],
			(array)$settings
		);

		$this->MonitoringObject =& ClassRegistry::init('MonitoringObject');
	}

	/**
	 * Adding the Monitor data within the Model data
	 */
	function afterFind(&$model, $results, $primary) {
		foreach ($results as $key => $val) {
			if (isset($val[$model->alias]['id'])) {
				$monitorings = $this->MonitoringObject->find('metrics', array(
					'conditions' => array(
						'model' => $model->name,
						'id' => $val[$model->alias]['id'],
						'type' => $this->settings[$model->alias]['type'],
					)
				));

				$results[$key][$model->alias][$this->settings[$model->alias]['type'].'s'] =
					$monitorings;
			}
		}
		return $results;
	}

	/**
	 * @param mixed $ref
	 * @return array
	 * @access public
	 */
	function node(&$model, $data) {
		$result = array();

		if(!isset($data[$model->alias][$model->primaryKey]))
			return $result;

		return array(
			$this->MonitoringObject->alias => array_merge(
				$this->settings[$model->alias],
				array(
					'foreign_key' => $data[$model->alias][$model->primaryKey]
		)));
	}

	function monitor(&$model, $data) {

		$saving = $this->node($model, $data);

		if(!empty ($saving)){
			$this->MonitoringObject->create();
			$this->MonitoringObject->save($saving);
		}
	}
}
