<?php
/**
 * Settings Controller
 *
 * PHP version 5
 *
 * @category Controller
 * @package  Croogo
 * @version  1.0
 * @author   Fahad Ibnay Heylaal <contact@fahad19.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.croogo.org
 */
class SettingsController extends AppController {
/**
 * Controller name
 *
 * @var string
 * @access public
 */
    public $name = 'Settings';
/**
 * Models used by the Controller
 *
 * @var array
 * @access public
 */
    public $uses = array('Setting','Package','Purchase','Va','PurchaseVa','Payment');
/**
 * Helpers used by the Controller
 *
 * @var array
 * @access public
 */
    public $helpers = array('Html', 'Form','FusionCharts.FusionCharts');

    var $components = array('FusionCharts.FusionCharts');  
    
    function admin_viewpdf()
    { 
        
        //Configure::write('debug',0); // Otherwise we cannot use this method while developing 

        $this->layout = 'pdf'; //this will use the pdf.ctp layout 
        $this->render(); 
    } 
    
	function admin_pie3d()
	{
		$results = $this->Purchase->query("SELECT packages.name,purchases.package_id,count(purchases.package_id) as count 
    		FROM `purchases` left join packages on packages.id=purchases.package_id  group by package_id");
		//debug($results);
		$total = 0;
		$pie_ar = array();
		foreach ($results as /*$key=>*/$result) {
			$total+= $result[0]['count'];
			
		}
		//echo $total;
		foreach ($results as /*$key2=>*/$value) {
			$pie_ar[] = array('value' => ($value[0]['count']/$total)*100, 'params' => array('name' => $value['packages']['name']));
		}
		
		$this->FusionCharts->create
			(
				'Pie3D Chart',
				array
				(
					'type' => 'Pie3D',
					'width' => 400,
					'height' => 250,
					'id' => ''
				)
			);

		$this->FusionCharts->setChartParams
			(
				'Pie3D Chart',
				array
				(
					'decimalPrecision'			=> '0',
					'showNames'					=> '1'
				)
			);

		$this->FusionCharts->addChartData
			(
				'Pie3D Chart',
				$pie_ar
			);
	}
	
	function admin_line2d()
	{
		$results = $this->Purchase->query("SELECT MONTH(purchases.date) as month,sum(payments.total_amount) as total,packages.name
    		FROM `purchases` 
			inner join packages on packages.id=purchases.package_id 
			inner join payments on purchases.id=payments.purchase_id 
			where year(purchases.date) = ".date('Y')." group by MONTH(purchases.date), purchases.package_id");
		//debug($results);
		$col_ar = array();
		$data_ar = array();
		
		foreach ($results as $key => $result) {
			foreach ($result[0] as $key1=>$data_ar){
				//echo $result[0]['total']."<br>";
				$data[$key]['value'] = $result[0]['total']; 
			}
			$color = $this->random_color();
			$col_ar[$result['packages']['name']] =  array(
				'params' => array('color' => $color,
				'anchorBorderColor'		=> $color,
				'anchorBgColor'			=> $color)
			,'data' => $data);
		}
		//debug($col_ar);
		/*debug(array
				(
					'Offline Marketing' => array
					(
						'params' => array
						(
							'color'					=> '1D8BD1',
							'anchorBorderColor'		=> '1D8BD1',
							'anchorBgColor'			=> '1D8BD1'
						),
						'data' => array
						(
							array('value' => '1327'),
							array('value' => '1826'),
							array('value' => '1699'),
							array('value' => '1511'),
							array('value' => '1904'),
							array('value' => '1957'),
							array('value' => '1296')
						)
					),
					'Search' => array
					(
						'params' => array
						(
							'color'					=> 'F1683C',
							'anchorBorderColor'		=> 'F1683C',
							'anchorBgColor'			=> 'F1683C'
						),
						'data' => array
						(
							array('value' => '2042'),
							array('value' => '3210'),
							array('value' => '2994'),
							array('value' => '3115'),
							array('value' => '2844'),
							array('value' => '3576'),
							array('value' => '1862')
						)
					),
					'Paid Search' => array
					(
						'params' => array
						(
							'color'					=> '2AD62A',
							'anchorBorderColor'		=> '2AD62A',
							'anchorBgColor'			=> '2AD62A'
						),
						'data' => array
						(
							array('value' => '850'),
							array('value' => '1010'),
							array('value' => '1116'),
							array('value' => '1234'),
							array('value' => '1210'),
							array('value' => '1054'),
							array('value' => '802')
						)
					),
					'From Mail' => array
					(
						'params' => array
						(
							'color'					=> 'DBDC25',
							'anchorBorderColor'		=> 'DBDC25',
							'anchorBgColor'			=> 'DBDC25'
						),
						'data' => array
						(
							array('value' => '541'),
							array('value' => '781'),
							array('value' => '920'),
							array('value' => '754'),
							array('value' => '840'),
							array('value' => '893'),
							array('value' => '451')
						)
					)
				));*/
		$this->FusionCharts->create
			(
				'Line2D Chart',
				array
				(
					'type' => 'MSLine',
					'width' => 500,
					'height' => 350,
					'id' => 'Line2D_5'
				)
			);

		$this->FusionCharts->setChartParams
			(
				'Line2D Chart',
				array
				(
					'caption'					=> 'Package Selling',
					'subcaption'				=> date('Y'),
					'hoverCapBg'				=> 'FFECAA',
					'hoverCapBorder'			=> '4',
					'showAreaBorder'			=> 'F47E00',
					'formatNumberScale'			=> '0',
					'decimalPrecision'			=> '0',
					'showvalues'				=> '0',
					'numDivLines'				=> '3',
					'numVDivLines'				=> '0',
					'yAxisMinValue'				=> '100',
					'yAxisMaxValue'				=> '3000',
					'yAxisName'					=> 'Total Euro',
					'rotateNames'				=> '1'
				)
			);

		$this->FusionCharts->addCategories
			(
				'Line2D Chart',
				array
				(
					'Jan',
					'Feb',
					'Mar',
					'Apr',
					'March',
					'May',
					'June',
					'July',
					'Ags',
					'Sep',
					'Oct',
					'Nov',
					'Dec'
				)
			);

		$this->FusionCharts->addDatasets
			(
				'Line2D Chart',
				$col_ar
			);
	}
	
	function admin_column3d()
	{
		$results = $this->Purchase->query("SELECT MONTH(purchases.date) as month,sum(payments.total_amount) as total,packages.name
    		FROM `purchases` 
			inner join packages on packages.id=purchases.package_id 
			inner join payments on purchases.id=payments.purchase_id 
			where year(purchases.date) = ".date('Y')." group by MONTH(purchases.date), purchases.package_id");
		
		//debug($results);
		
		$col_ar = array();
		$data_ar = array();
		
		foreach ($results as $key => $result) {
			foreach ($result[0] as $key1=>$data_ar){
				//echo $result[0]['total']."<br>";
				$data[$key]['value'] = $result[0]['total']; 
			}
			$col_ar[$result['packages']['name']] =  array(
				'params' => array('color' => $this->random_color()),'data' => $data);
		}
		
		//debug($col_ar);
		
		$this->FusionCharts->create
			(
				'Column3D Chart',
				array
				(
					'type' => 'MSColumn3D',
					'width' => 550,
					'height' => 400,
					'id' => ''
				)
			);

		$this->FusionCharts->setChartParams
			(
				'Column3D Chart',
				array
				(
					'caption'					=> 'Package Details',
					'subcaption'				=> 'Sales Graph',
					'xAxisName'					=> 'Packages',
					'yAxisName'					=> 'Total Euro',
					'hoverCapBg'				=> 'DEDEBE',
					'hoverCapBorder'			=> '889E6D',
					'rotateNames'				=> '0',
					'yAxisMaxValue'				=> '100',
					'numDivLines'				=> '9',
					'divLineColor'				=> 'CCCCCC',
					'divLineAlpha'				=> '80',
					'decimalPrecision'			=> '0',
					'showAlternateHGridColor'	=> '1',
					'AlternateHGridAlpha'		=> '30',
					'AlternateHGridColor'		=> 'CCCCCC'
				)
			);

		$this->FusionCharts->setCategoriesParams
			(
				'Column3D Chart',
				array
				(
					'font' => 'Arial',
					'fontSize' => '11',
					'fontColor' => '000000'
				)
			);

		$this->FusionCharts->addCategories
			(
				'Column3D Chart',
				array
				(
					'Jan' => array('hoverText' => 'Jan'),
					'Feb'=> array('hoverText' => 'Feb'),
					'Mar'=> array('hoverText' => 'Mar'),
					'Apr'=> array('hoverText' => 'Apr'),
					'March'=> array('hoverText' => 'March'),
					'May'=> array('hoverText' => 'May'),
					'June'=> array('hoverText' => 'June'),
					'July'=> array('hoverText' => 'July'),
					'Ags'=> array('hoverText' => 'Ags'),
					'Sep'=> array('hoverText' => 'Sep'),
					'Oct'=> array('hoverText' => 'Oct'),
					'Nov'=> array('hoverText' => 'Nov'),
					'Dec'=> array('hoverText' => 'Dec')
				)
			);

		
		$this->FusionCharts->addDatasets
		(
				'Column3D Chart',

				$col_ar
			
		);
		/*debug(array
				(
					'Package 1' => array
					(
						'params' => array('color' => 'FDC12E'),
						'data' => array
						(
							array('value' => '125'),
							array('value' => '150'),
							array('value' => '250')
						)
					),
					'Package 2' => array
					(
						'params' => array('color' => '56B9F9'),
						'data' => array
						(
							array('value' => '200'),
							array('value' => '299'),
							array('value' => '150')
						)
					),
					'Package 3' => array
					(
						'params' => array('color' => 'C9198D'),
						'data' => array
						(
							array('value' => '220'),
							array('value' => '100'),
							array('value' => '200')
						)
					)
				));*/
		/*$this->FusionCharts->addDatasets
			(
				'Column3D Chart',
				array
				(
					'Package 1' => array
					(
						'params' => array('color' => 'FDC12E'),
						'data' => array
						(
							array('value' => '125'),
							array('value' => '150'),
							array('value' => '250')
						)
					),
					'Package 2' => array
					(
						'params' => array('color' => '56B9F9'),
						'data' => array
						(
							array('value' => '200'),
							array('value' => '299'),
							array('value' => '150')
						)
					),
					'Package 3' => array
					(
						'params' => array('color' => 'C9198D'),
						'data' => array
						(
							array('value' => '220'),
							array('value' => '100'),
							array('value' => '200')
						)
					)
				)
			);*/
	}
	
	function random_color(){
	    mt_srand((double)microtime()*1000000);
	    $c = '';
	    while(strlen($c)<6){
	        $c .= sprintf("%02X", mt_rand(0, 255));
	    }
	    return $c;
	}

    public function getPackageSellingDetails($start_date,$end_date){
    	return $this->Purchase->find('count', array(
		    'conditions' => array(
	    		//'Purchase.status' => 'APPROVED',
    			'Purchase.date BETWEEN ? and ?' => array($start_date, $end_date)
	    	),
		));
    }
    
    public function getTotalEarning($start_date,$end_date){
    	return $this->Payment->find('first', array(
		    'conditions' => array(
	    		//'Purchase.status' => 'APPROVED',
    			'Payment.created BETWEEN ? and ?' => array($start_date, $end_date)
	    	),
	    	'fields' =>'sum(Payment.total_amount) as total',
		));
    }
    
    public function sellerVas($select = 'max'){
    	$result = $this->Purchase->query("SELECT * from (SELECT
						vas.`name`,count(purchase_vas.vas_id) as cnt
						FROM
						purchase_vas
						INNER JOIN vas ON vas.id = purchase_vas.vas_id
						GROUP BY purchase_vas.vas_id) as tbl
						where tbl.cnt= (
						select $select(tbl2.cnt) from (SELECT
						count(purchase_vas.vas_id) as cnt
						FROM
						purchase_vas
						INNER JOIN vas ON purchase_vas.vas_id = vas.id
						GROUP BY purchase_vas.vas_id) as tbl2)");
    	
    	return $result[0]['tbl']['name'];
    	
    }
    
    public function sellersPackage($select = 'max'){
    	/*return $this->Purchase->find('first', array(
		    'conditions' => array(
	    		//'Purchase.status' => 'APPROVED',
    				
	    	),
	    	'fields' =>'Purchase.package_id','count(*) as count',
	    	'group'=> 'Purchase.package_id',
		));*/
    	/*$this->Purchase->query("drop view IF EXISTS view_counts;");
    	$this->Purchase->query("CREATE VIEW view_counts AS SELECT packages.name,purchases.package_id,count(purchases.package_id) as count 
    		FROM `purchases` left join packages on packages.id=purchases.package_id  group by package_id;");*/
    	/*$result = $this->Purchase->query("SELECT max(cnt) FROM (SELECT packages.name,purchases.package_id,COUNT(purchases.package_id) as cnt FROM purchases 
    				left join packages on packages.id=purchases.package_id  GROUP BY purchases.package_id) AS myDerivedTable");*/
    	
    	/*$result = $this->Purchase->query("SELECT view_counts.name,max(count) FROM view_counts group by package_id order by count ".$order." limit 0,1;");*/
    	
    	$result = $this->Purchase->query("select * from (SELECT
						packages.`name`,count(purchases.package_id) as cnt,purchases.package_id
						FROM
						purchases
						INNER JOIN packages ON purchases.package_id = packages.id
						GROUP BY purchases.package_id) as tbl
						where tbl.cnt= (
						select ".$select."(tbl2.cnt) from (SELECT
						count(purchases.package_id) as cnt
						FROM
						purchases
						INNER JOIN packages ON purchases.package_id = packages.id
						GROUP BY purchases.package_id) as tbl2)");
    	//debug($result);
    	
    	return $result[0]['tbl']['name'];
    }
    
    public function admin_dashboard() {
    	//$this->Purchase->query("SELECT COUNT(id),MONTH(date) FROM purchases GROUP BY YEAR(date), MONTH(date);");
    	//Configure::write ( 'debug', 0 );
    	$today_sell_details = $this->getPackageSellingDetails(date('Y-m-d'),date('Y-m-d'));
    	$this_week_sell_details = $this->getPackageSellingDetails(date('Y-m-d', strtotime("-1 week")), date('Y-m-d'));
    	$this_month_sell_details = $this->getPackageSellingDetails(date('Y-m-d', strtotime("-1 month")), date('Y-m-d'));
    	$this_year_sell_details = $this->getPackageSellingDetails(date('Y-m-d', strtotime("-1 year")), date('Y-m-d'));
    	//debug($today_sell_details);
    	$total_earning_today = $this->getTotalEarning(date('Y-m-d'),date('Y-m-d'));
    	$total_earning_this_month = $this->getTotalEarning(date('Y-m-d', strtotime("-1 month")), date('Y-m-d'));
    	//debug($total_earning_this_month);
    	$best_sell_package = $this->sellersPackage();
    	$less_sell_package = $this->sellersPackage('min');
    	
    	$best_sell_vas = $this->sellerVas('max');
    	$less_sell_vas = $this->sellerVas('min');
    	//debug($less_sell_package);
    	$this->set(compact('today_sell_details','this_week_sell_details','this_month_sell_details','this_year_sell_details',
    		'total_earning_today','total_earning_this_month','best_sell_package','less_sell_package','best_sell_vas','less_sell_vas'));
        $this->set('title_for_layout', __('Dashboard', true));
    }

    public function admin_index() {
        $this->set('title_for_layout', __('Settings', true));

        $this->Setting->recursive = 0;
        $this->paginate['Setting']['order'] = "Setting.weight ASC";
        if (isset($this->params['named']['p'])) {
            $this->paginate['Setting']['conditions'] = "Setting.key LIKE '". $this->params['named']['p'] ."%'";
        }
        $this->set('settings', $this->paginate());
    }

    public function admin_view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid Setting.', true), 'default', array('class' => 'error'));
            $this->redirect(array('action'=>'index'));
        }
        $this->set('setting', $this->Setting->read(null, $id));
    }

    public function admin_add() {
        $this->set('title_for_layout', __('Add Setting', true));

        if (!empty($this->data)) {
            $this->Setting->create();
            if ($this->Setting->save($this->data)) {
                $this->Session->setFlash(__('The Setting has been saved', true), 'default', array('class' => 'success'));
                $this->redirect(array('action'=>'index'));
            } else {
                $this->Session->setFlash(__('The Setting could not be saved. Please, try again.', true), 'default', array('class' => 'error'));
            }
        }
    }

    public function admin_edit($id = null) {
        $this->set('title_for_layout', __('Edit Setting', true));

        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid Setting', true), 'default', array('class' => 'error'));
            $this->redirect(array('action'=>'index'));
        }
        if (!empty($this->data)) {
            if ($this->Setting->save($this->data)) {
                $this->Session->setFlash(__('The Setting has been saved', true), 'default', array('class' => 'success'));
                $this->redirect(array('action'=>'index'));
            } else {
                $this->Session->setFlash(__('The Setting could not be saved. Please, try again.', true), 'default', array('class' => 'error'));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Setting->read(null, $id);
        }
    }

    public function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for Setting', true), 'default', array('class' => 'error'));
            $this->redirect(array('action'=>'index'));
        }
        if (!isset($this->params['named']['token']) || ($this->params['named']['token'] != $this->params['_Token']['key'])) {
            $blackHoleCallback = $this->Security->blackHoleCallback;
            $this->$blackHoleCallback();
        }
        if ($this->Setting->delete($id)) {
            $this->Session->setFlash(__('Setting deleted', true), 'default', array('class' => 'success'));
            $this->redirect(array('action'=>'index'));
        }
    }

    public function admin_prefix($prefix = null) {
        $this->set('title_for_layout', sprintf(__('Settings: %s', true), $prefix));

        if(!empty($this->data) && $this->Setting->saveAll($this->data['Setting'])) {
            $this->Session->setFlash(__("Settings updated successfully", true), 'default', array('class' => 'success'));
        }

        $settings = $this->Setting->find('all', array(
            'order' => 'Setting.weight ASC',
            'conditions' => array(
                'Setting.key LIKE' => $prefix . '.%',
                'Setting.editable' => 1,
            ),
        ));
            //'conditions' => "Setting.key LIKE '".$prefix."%'"));
        $this->set(compact('settings'));

        if( count($settings) == 0 ) {
            $this->Session->setFlash(__("Invalid Setting key", true), 'default', array('class' => 'error'));
        }

        $this->set("prefix", $prefix);
    }

    public function admin_moveup($id, $step = 1) {
        if( $this->Setting->moveup($id, $step) ) {
            $this->Session->setFlash(__('Moved up successfully', true), 'default', array('class' => 'success'));
        } else {
            $this->Session->setFlash(__('Could not move up', true), 'default', array('class' => 'error'));
        }

        $this->redirect(array('admin' => true, 'controller' => 'settings', 'action' => 'index'));
    }

    public function admin_movedown($id, $step = 1) {
        if( $this->Setting->movedown($id, $step) ) {
            $this->Session->setFlash(__('Moved down successfully', true), 'default', array('class' => 'success'));
        } else {
            $this->Session->setFlash(__('Could not move down', true), 'default', array('class' => 'error'));
        }

        $this->redirect(array('admin' => true, 'controller' => 'settings', 'action' => 'index'));
    }

}
?>