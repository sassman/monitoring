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
	 * @updated 2011-01-29
	 * @see http://www.robotstxt.org/db/all.txt
	 * @command awk 'BEGIN {FS=":"} /robot-name/{gsub(/^[ \t]+/,"",$2);gsub(/[ \t]+$/, "", $2);printf("\"%s\",\n",$2)}' all.txt
	 */
	public $bot_list = array(
		'ABCdatos BotLink', 'Acme.Spider', 'Ahoy! The Homepage Finder', 'Alkaline', 'Anthill', 'Walhello appie', 'Arachnophilia', 'Arale', 'Araneo', 'AraybOt', 'ArchitextSpider', 'Aretha', 'ARIADNE', 'arks', 'ASpider (Associative Spider)', 'ATN Worldwide', 'Atomz.com Search Robot', 'AURESYS', 'BackRub', 'robot-name', 'BBot', 'Big Brother', 'Bjaaland', 'BlackWidow', 'Die Blinde Kuh', 'Bloodhound', 'Borg-Bot', 'BoxSeaBot', 'bright.net caching robot', 'BSpider', 'CACTVS Chemistry Spider', 'Calif', 'Cassandra', 'Digimarc Marcspider/CGI', 'Checkbot', 'ChristCrawler.com', 'churl', 'cIeNcIaFiCcIoN.nEt', 'CMC/0.01', 'Collective', 'Combine System', 'ConfuzzledBot', 'CoolBot', 'Web Core / Roots', 'XYLEME Robot', 'Internet Cruiser Robot', 'Cusco', 'CyberSpyder Link Test', 'CydralSpider', 'Desert Realm Spider', 'DeWeb(c) Katalog/Index', 'DienstSpider', 'Digger', 'Digital Integrity Robot', 'Direct Hit Grabber', 'DNAbot', 'DownLoad Express', 'DragonBot', 'DWCP (Dridus\' Web Cataloging Project)', 'e-collector', 'EbiNess', 'EIT Link Verifier Robot', 'ELFINBOT', 'Emacs-w3 Search Engine', 'ananzi', 'esculapio', 'Esther', 'Evliya Celebi', 'nzexplorer', 'FastCrawler', 'Fluid Dynamics Search Engine robot', 'Felix IDE', 'Wild Ferret Web Hopper #1, #2, #3', 'FetchRover', 'fido', 'Hämähäkki', 'KIT-Fireball', 'Fish search', 'Fouineur', 'Robot Francoroute', 'Freecrawl', 'FunnelWeb', 'gammaSpider, FocusedCrawler', 'gazz', 'GCreep', 'GetBot', 'GetURL', 'Golem', 'Googlebot', 'Grapnel/0.01 Experiment', 'Griffon', 'Gromit', 'Northern Light Gulliver', 'Gulper Bot', 'HamBot', 'Harvest', 'havIndex', 'HI (HTML Index) Search', 'Hometown Spider Pro', 'Wired Digital', 'ht', 'HTMLgobble', 'Hyper-Decontextualizer', 'iajaBot', 'IBM_Planetwide', 'Popular Iconoclast', 'Ingrid', 'Imagelock', 'IncyWincy', 'Informant', 'InfoSeek Robot 1.0', 'Infoseek Sidewinder', 'InfoSpiders', 'Inspector Web', 'IntelliAgent', 'I, Robot', 'Iron33', 'Israeli-search', 'JavaBee', 'JBot Java Web Robot', 'JCrawler', 'AskJeeves', 'JoBo Java Web Robot', 'Jobot', 'JoeBot', 'The Jubii Indexing Robot', 'JumpStation', 'image.kapsi.net', 'Katipo', 'KDD-Explorer', 'Kilroy', 'KO_Yappo_Robot', 'LabelGrabber', 'larbin', 'legs', 'Link Validator', 'LinkScan', 'LinkWalker', 'Lockon', 'logo.gif Crawler', 'Lycos', 'Mac WWWWorm', 'Magpie', 'marvin/infoseek', 'Mattie', 'MediaFox', 'MerzScope', 'NEC-MeshExplorer', 'MindCrawler', 'mnoGoSearch search engine software', 'moget', 'MOMspider', 'Monster', 'Motor', 'MSNBot', 'Muncher', 'Muninn', 'Muscat Ferret', 'Mwd.Search', 'Internet Shinchakubin', 'NDSpider', 'NetCarta WebMap Engine', 'NetMechanic', 'NetScoop', 'newscan-online', 'NHSE Web Forager', 'Nomad', 'The NorthStar Robot', 'ObjectsSearch', 'Occam', 'HKU WWW Octopus', 'OntoSpider', 'Openfind data gatherer', 'Orb Search', 'Pack Rat', 'PageBoy', 'ParaSite', 'Patric', 'pegasus', 'The Peregrinator', 'PerlCrawler 1.0', 'Phantom', 'PhpDig', 'PiltdownMan', 'Pimptrain.com\'s robot', 'Pioneer', 'html_analyzer', 'Portal Juice Spider', 'PGP Key Agent', 'PlumtreeWebAccessor', 'Poppi', 'PortalB Spider', 'psbot', 'GetterroboPlus Puu', 'The Python Robot', 'Raven Search', 'RBSE Spider', 'Resume Robot', 'RoadHouse Crawling System', 'RixBot', 'Road Runner', 'Robbie the Robot', 'ComputingSite Robi/1.0', 'RoboCrawl Spider', 'RoboFox', 'Robozilla', 'Roverbot', 'RuLeS', 'SafetyNet Robot', 'Scooter', 'Search.Aus-AU.COM', 'Sleek', 'SearchProcess', 'Senrigan', 'SG-Scout', 'ShagSeeker', 'Shai\'Hulud', 'Sift', 'Simmany Robot Ver1.0', 'Site Valet', 'SiteTech-Rover', 'Skymob.com', 'SLCrawler', 'Inktomi Slurp', 'Smart Spider', 'Snooper', 'Solbot', 'Speedy Spider', 'spider_monkey', 'SpiderBot', 'Spiderline Crawler', 'SpiderMan', 'SpiderView(tm)', 'Spry Wizard Robot', 'Site Searcher', 'Suke', 'suntek search engine', 'Sven', 'Sygol', 'TACH Black Widow', 'Tarantula', 'tarspider', 'Tcl W3 Robot', 'TechBOT', 'Templeton', 'TitIn', 'TITAN', 'The TkWWW Robot', 'TLSpider', 'UCSD Crawl', 'UdmSearch', 'UptimeBot', 'URL Check', 'URL Spider Pro', 'Valkyrie', 'Verticrawl', 'Victoria', 'vision-search', 'void-bot', 'Voyager', 'VWbot', 'The NWI Robot', 'W3M2', 'WallPaper (alias crawlpaper)', 'the World Wide Web Wanderer', 'w@pSpider by wap4.com', 'WebBandit Web Spider', 'WebCatcher', 'WebCopy', 'webfetcher', 'The Webfoot Robot', 'Webinator', 'weblayers', 'WebLinker', 'WebMirror', 'The Web Moose', 'WebQuest', 'Digimarc MarcSpider', 'WebReaper', 'webs', 'Websnarf', 'WebSpider', 'WebVac', 'webwalk', 'WebWalker', 'WebWatch', 'Wget', 'whatUseek Winona', 'WhoWhere Robot', 'Weblog Monitor', 'w3mir', 'WebStolperer', 'The Web Wombat', 'The World Wide Web Worm', 'WWWC Ver 0.2.5', 'WebZinger', 'XGET', 'Nederland.zoek',
	);

	/**
	 * @param mixed $config
	 * @return void
	 * @access public
	 */
	function setup(&$Model, $settings = array()) {
		if (!isset($this->settings[$Model->alias])) {
			$this->settings[$Model->alias] = array(
				'prevent_bots' => true,
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

		$this->MonitoringObject =& ClassRegistry::init('monitoring.MonitoringObject');
	}

	/**
	 * Adding the Monitor data within the Model data
	 */
	function afterFind(&$model, $results, $primary) {
		if(!$results) {
			return $results;
		}
		$types = !is_array($this->settings[$model->alias]['type'])
			? array($this->settings[$model->alias]['type'])
			: $this->settings[$model->alias]['type'];
			
		foreach ($results as $key => $val) {
			if (isset($val[$model->alias]['id'])) {
				foreach($types as $type) {
					$metrics = $this->_getValue($model->name, $val[$model->alias]['id'], $type);
					$results[$key][$model->alias][$type.'s'] = $metrics;
				}
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
		$result = $save = array();

		$save = array_intersect_key($data, array('foreign_key' => true, 'type' => true));
		if(empty($data[$model->alias][$model->primaryKey])) {
			if(empty($model->{$model->primaryKey})) {
				return $result;
			}
			else {
				$save['foreign_key'] = $model->{$model->primaryKey};
			}
		}else {
			$save['foreign_key'] = $data[$model->alias][$model->primaryKey];
		}

		return array(
			$this->MonitoringObject->alias => array_merge(
				$this->settings[$model->alias],
				$save
		));
	}

	function monitor(&$model, $data) {

		if($this->settings[$model->alias]['prevent_bots']) {
			$is_bot = $this->identifyBot($this->settings[$model->alias]['user_agent']);
			if($is_bot) {
				return;
			}
		}

		$saving = $this->node($model, $data);

		if(!empty ($saving)){
			$this->MonitoringObject->create();
			$this->MonitoringObject->save($saving);
		}

		
		$this->_setValue(
			$saving[$this->MonitoringObject->alias]['model'],
			$saving[$this->MonitoringObject->alias]['foreign_key'],
			$saving[$this->MonitoringObject->alias]['type'],
			$this->MonitoringObject->find('metrics', array(
				'conditions' => array_intersect_key($saving[$this->MonitoringObject->alias], array(
					'model' => true, 'foreign_key' => true, 'type' => true
				)
			)))
		);
	}

	protected function identifyBot($user_agent) {
		foreach($this->bot_list as $bot) {
			if(ereg($bot, $user_agent)) {
				return $bot;
			}
		}
		return false;
	}

	protected function _setValue($model, $foreign_key, $type, $metrics, $useCache = true) {
		if($useCache) {
			$cacheKey = 'monitorable_'.Inflector::underscore($model).'_'.$type.'_'.$foreign_key;
			Cache::write($cacheKey, $metrics);
		}
		return $metrics;
	}

	protected function _getValue($model, $foreign_key, $type, $useCache = true) {
		$data = compact('model', 'foreign_key', 'type');
		$metrics = false;
		if($useCache) {
			$cacheKey = 'monitorable_'.Inflector::underscore($data['model']).'_'.$data['type'].'_'.$data['foreign_key'];
			$metrics = Cache::read($cacheKey);
		}
		$metrics = $metrics !== false
			? $metrics
			: $this->_setValue($data['model'], $data['foreign_key'], $data['type'], $this->MonitoringObject->find('metrics', array(
				'conditions' => $data
			)));
		return $metrics;
	}
}
