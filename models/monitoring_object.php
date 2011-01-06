<?php

/**
 * MonitoringObject
 * created: 06.01.2011 / 12:27:30
 *
 * PHP Version 5
 *
 * @category	model
 * @package		biz.lubico.cake.monitoring
 * @version		v1.0.0
 * @since		v1.0.0
 * @author		Sven Aßmann <sven.assmann@lubico.biz>
 * @licence		MIT
 * @link		http://www.lubico.biz
 * @copyright	Copyright (C) 2006 - 2011,  Lubico Business, Sven Aßmann <sven.assmann@lubico.biz>
 *
 */
class MonitoringObject extends AppModel {

	public $name = 'MonitoringObject';
	public $cacheQueries = false;
	public $_findMethods = array('metrics' => true);

	
	public function _findMetrics($state, $query, array $results = array()) {
		if($state == 'before') {
			$query = $this->_findCount($state, $query, $results);
			return $query;
		}
		elseif ($state == 'after') {
			$results = $this->_findCount($state, $query, $results);
			return $results;
		}
	}
}