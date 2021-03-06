<?php

class ShowbuilderController extends Zend_Controller_Action
{

    public function init()
    {
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('schedule-move', 'json')
                    ->addActionContext('schedule-add', 'json')
                    ->addActionContext('schedule-remove', 'json')
                    ->addActionContext('builder-dialog', 'json')
                    ->addActionContext('check-builder-feed', 'json')
                    ->addActionContext('builder-feed', 'json')
                    ->addActionContext('context-menu', 'json')
                    ->initContext();
    }

    public function indexAction() {
        
        global $CC_CONFIG;
        
        $request = $this->getRequest();
        $baseUrl = $request->getBaseUrl();
        $user = Application_Model_User::GetCurrentUser();
        
        $userType = $user->getType();
        $this->view->headScript()->appendScript("localStorage.setItem( 'user-type', '$userType' );");
        
        $data = Application_Model_Preference::GetValue("library_datatable", true);
        if ($data != "") {
            $libraryTable = json_encode(unserialize($data));
            $this->view->headScript()->appendScript("localStorage.setItem( 'datatables-library', JSON.stringify($libraryTable) );");
        }
        else {
            $this->view->headScript()->appendScript("localStorage.setItem( 'datatables-library', '' );");
        }
        
        $data = Application_Model_Preference::GetValue("timeline_datatable", true);
        if ($data != "") {
            $timelineTable = json_encode(unserialize($data));
            $this->view->headScript()->appendScript("localStorage.setItem( 'datatables-timeline', JSON.stringify($timelineTable) );");
        }
        else {
            $this->view->headScript()->appendScript("localStorage.setItem( 'datatables-timeline', '' );");
        }
         
        $this->view->headScript()->appendFile($baseUrl.'/js/contextmenu/jquery.contextMenu.js?'.$CC_CONFIG['airtime_version'],'text/javascript');
        $this->view->headScript()->appendFile($baseUrl.'/js/datatables/js/jquery.dataTables.js?'.$CC_CONFIG['airtime_version'],'text/javascript');
        $this->view->headScript()->appendFile($baseUrl.'/js/datatables/plugin/dataTables.pluginAPI.js?'.$CC_CONFIG['airtime_version'],'text/javascript');
        $this->view->headScript()->appendFile($baseUrl.'/js/datatables/plugin/dataTables.fnSetFilteringDelay.js?'.$CC_CONFIG['airtime_version'],'text/javascript');
        $this->view->headScript()->appendFile($baseUrl.'/js/datatables/plugin/dataTables.ColVis.js?'.$CC_CONFIG['airtime_version'],'text/javascript');
        $this->view->headScript()->appendFile($baseUrl.'/js/datatables/plugin/dataTables.ColReorder.js?'.$CC_CONFIG['airtime_version'],'text/javascript');
        $this->view->headScript()->appendFile($baseUrl.'/js/datatables/plugin/dataTables.FixedColumns.js?'.$CC_CONFIG['airtime_version'],'text/javascript');
       
        $this->view->headScript()->appendFile($baseUrl.'/js/blockui/jquery.blockUI.js?'.$CC_CONFIG['airtime_version'],'text/javascript');
        $this->view->headScript()->appendFile($baseUrl.'/js/airtime/buttons/buttons.js?'.$CC_CONFIG['airtime_version'],'text/javascript');
        $this->view->headScript()->appendFile($baseUrl.'/js/airtime/utilities/utilities.js?'.$CC_CONFIG['airtime_version'],'text/javascript');
        $this->view->headScript()->appendFile($baseUrl.'/js/airtime/library/library.js?'.$CC_CONFIG['airtime_version'],'text/javascript');
        
        $this->view->headLink()->appendStylesheet($baseUrl.'/css/media_library.css?'.$CC_CONFIG['airtime_version']);
        $this->view->headLink()->appendStylesheet($baseUrl.'/css/jquery.contextMenu.css?'.$CC_CONFIG['airtime_version']);
        $this->view->headLink()->appendStylesheet($baseUrl.'/css/datatables/css/ColVis.css?'.$CC_CONFIG['airtime_version']);
        $this->view->headLink()->appendStylesheet($baseUrl.'/css/datatables/css/ColReorder.css?'.$CC_CONFIG['airtime_version']);
        
        $this->view->headScript()->appendFile($this->view->baseUrl('/js/airtime/library/events/library_showbuilder.js?'.$CC_CONFIG['airtime_version']),'text/javascript');
         
        $refer_sses = new Zend_Session_Namespace('referrer');
        
        if ($request->isPost()) {
        	$form = new Application_Form_RegisterAirtime();
        
        	$values = $request->getPost();
        	if ($values["Publicise"] != 1 && $form->isValid($values)) {
        		Application_Model_Preference::SetSupportFeedback($values["SupportFeedback"]);
        		
        		if (isset($values["Privacy"])) {
        			Application_Model_Preference::SetPrivacyPolicyCheck($values["Privacy"]);
        		}
        		// unset session
        		Zend_Session::namespaceUnset('referrer');
        	}
        	else if ($values["Publicise"] == '1' && $form->isValid($values)) {
        		Application_Model_Preference::SetHeadTitle($values["stnName"], $this->view);
        		Application_Model_Preference::SetPhone($values["Phone"]);
        		Application_Model_Preference::SetEmail($values["Email"]);
        		Application_Model_Preference::SetStationWebSite($values["StationWebSite"]);
        		Application_Model_Preference::SetPublicise($values["Publicise"]);
        
        		$form->Logo->receive();
        		$imagePath = $form->Logo->getFileName();
        
        		Application_Model_Preference::SetStationCountry($values["Country"]);
        		Application_Model_Preference::SetStationCity($values["City"]);
        		Application_Model_Preference::SetStationDescription($values["Description"]);
        		Application_Model_Preference::SetStationLogo($imagePath);
        		Application_Model_Preference::SetSupportFeedback($values["SupportFeedback"]);
        		
        		if (isset($values["Privacy"])){
        			Application_Model_Preference::SetPrivacyPolicyCheck($values["Privacy"]);
        		}
        		// unset session
        		Zend_Session::namespaceUnset('referrer');
        	}
        	else {
        		$logo = Application_Model_Preference::GetStationLogo();
        		if ($logo) {
        			$this->view->logoImg = $logo;
        		}
        		$this->view->dialog = $form;
        		$this->view->headScript()->appendFile($baseUrl.'/js/airtime/nowplaying/register.js?'.$CC_CONFIG['airtime_version'],'text/javascript');
        	}
        }

    	//popup if previous page was login
    	if ($refer_sses->referrer == 'login' && Application_Model_Preference::ShouldShowPopUp()
    			&& !Application_Model_Preference::GetSupportFeedback() && $user->isAdmin()){
    
    		$form = new Application_Form_RegisterAirtime();
    
    		$logo = Application_Model_Preference::GetStationLogo();
    		if ($logo) {
    			$this->view->logoImg = $logo;
    		}
    		$this->view->dialog = $form;
    		$this->view->headScript()->appendFile($baseUrl.'/js/airtime/nowplaying/register.js?'.$CC_CONFIG['airtime_version'],'text/javascript');
    	}
   
    	//determine whether to remove/hide/display the library.
    	$showLib = false;
    	if (!$user->isGuest()) {
    	    $disableLib = false;
            $data = Application_Model_Preference::GetValue("nowplaying_screen", true);
            if ($data != "") {
                $settings = unserialize($data);
                
                if ($settings["library"] == "true") {
                    $showLib = true;
                }
            }
    	}
    	else {
    	    $disableLib = true;
    	}
    	$this->view->disableLib = $disableLib;
    	$this->view->showLib = $showLib;
       
        //populate date range form for show builder.
        $now = time();
        $from = $request->getParam("from", $now);
        $to = $request->getParam("to", $now + (24*60*60));

        $start = DateTime::createFromFormat("U", $from, new DateTimeZone("UTC"));
        $start->setTimezone(new DateTimeZone(date_default_timezone_get()));
        $end = DateTime::createFromFormat("U", $to, new DateTimeZone("UTC"));
        $end->setTimezone(new DateTimeZone(date_default_timezone_get()));

        $form = new Application_Form_ShowBuilder();
        $form->populate(array(
            'sb_date_start' => $start->format("Y-m-d"),
            'sb_time_start' => $start->format("H:i"),
            'sb_date_end' => $end->format("Y-m-d"),
            'sb_time_end' => $end->format("H:i")
        ));

        $this->view->sb_form = $form;

        $offset = date("Z") * -1;
        $this->view->headScript()->appendScript("var serverTimezoneOffset = {$offset}; //in seconds");
        $this->view->headScript()->appendFile($baseUrl.'/js/timepicker/jquery.ui.timepicker.js?'.$CC_CONFIG['airtime_version'],'text/javascript');
        $this->view->headScript()->appendFile($baseUrl.'/js/airtime/showbuilder/builder.js?'.$CC_CONFIG['airtime_version'],'text/javascript');
        $this->view->headScript()->appendFile($baseUrl.'/js/airtime/showbuilder/main_builder.js?'.$CC_CONFIG['airtime_version'],'text/javascript');

        $this->view->headLink()->appendStylesheet($baseUrl.'/css/jquery.ui.timepicker.css?'.$CC_CONFIG['airtime_version']);
        $this->view->headLink()->appendStylesheet($baseUrl.'/css/showbuilder.css?'.$CC_CONFIG['airtime_version']);
    }
    
    public function contextMenuAction()
    {
        $id = $this->_getParam('id');
        $now = floatval(microtime(true));
    
        $request = $this->getRequest();
        $baseUrl = $request->getBaseUrl();
        $menu = array();
    
        $user = Application_Model_User::GetCurrentUser();
    
        $item = CcScheduleQuery::create()->findPK($id);
        $instance = $item->getCcShowInstances();
    
        $menu["preview"] = array("name"=> "Preview", "icon" => "play");
        //select the cursor
        $menu["selCurs"] = array("name"=> "Select Cursor","icon" => "select-cursor");
        $menu["delCurs"] = array("name"=> "Remove Cursor","icon" => "select-cursor");
    
        if ($now < floatval($item->getDbEnds("U.u")) && $user->canSchedule($instance->getDbShowId())) {
    
            //remove/truncate the item from the schedule
            $menu["del"] = array("name"=> "Delete", "icon" => "delete", "url" => "/showbuilder/schedule-remove");
        }
    
        $this->view->items = $menu;
    }

    public function builderDialogAction() {

        $request = $this->getRequest();
        $id = $request->getParam("id");

        $instance = CcShowInstancesQuery::create()->findPK($id);

        if (is_null($instance)) {
            $this->view->error = "show does not exist";
            return;
        }

        $start = $instance->getDbStarts(null);
        $start->setTimezone(new DateTimeZone(date_default_timezone_get()));
        $end = $instance->getDbEnds(null);
        $end->setTimezone(new DateTimeZone(date_default_timezone_get()));

        $show_name = $instance->getCcShow()->getDbName();
        $start_time = $start->format("Y-m-d H:i:s");
        $end_time = $end->format("Y-m-d H:i:s");

        $this->view->title = "{$show_name}:    {$start_time} - {$end_time}";
        $this->view->start = $instance->getDbStarts("U");
        $this->view->end = $instance->getDbEnds("U");

        $this->view->dialog = $this->view->render('showbuilder/builderDialog.phtml');
    }

    public function checkBuilderFeedAction() {

        $request = $this->getRequest();
        $current_time = time();

        $starts_epoch = $request->getParam("start", $current_time);
        //default ends is 24 hours after starts.
        $ends_epoch = $request->getParam("end", $current_time + (60*60*24));
        $show_filter = intval($request->getParam("showFilter", 0));
        $my_shows = intval($request->getParam("myShows", 0));
        $timestamp = intval($request->getParam("timestamp", -1));
        $instances = $request->getParam("instances", array());

        $startsDT = DateTime::createFromFormat("U", $starts_epoch, new DateTimeZone("UTC"));
        $endsDT = DateTime::createFromFormat("U", $ends_epoch, new DateTimeZone("UTC"));

        $opts = array("myShows" => $my_shows, "showFilter" => $show_filter);
        $showBuilder = new Application_Model_ShowBuilder($startsDT, $endsDT, $opts);

        //only send the schedule back if updates have been made.
        // -1 default will always call the schedule to be sent back if no timestamp is defined.
        if ($showBuilder->hasBeenUpdatedSince($timestamp, $instances)) {
            $this->view->update = true;
        }
        else {
            $this->view->update = false;
        }
    }

    public function builderFeedAction() {

        $start = microtime(true);
        
        $request = $this->getRequest();
        $current_time = time();

        $starts_epoch = $request->getParam("start", $current_time);
        //default ends is 24 hours after starts.
        $ends_epoch = $request->getParam("end", $current_time + (60*60*24));
        $show_filter = intval($request->getParam("showFilter", 0));
        $my_shows = intval($request->getParam("myShows", 0));
        $timestamp = intval($request->getParam("timestamp", -1));

        $startsDT = DateTime::createFromFormat("U", $starts_epoch, new DateTimeZone("UTC"));
        $endsDT = DateTime::createFromFormat("U", $ends_epoch, new DateTimeZone("UTC"));

        $opts = array("myShows" => $my_shows, "showFilter" => $show_filter);
        $showBuilder = new Application_Model_ShowBuilder($startsDT, $endsDT, $opts);

        $data = $showBuilder->GetItems();
        $this->view->schedule = $data["schedule"];
        $this->view->instances = $data["showInstances"];
        $this->view->timestamp = $current_time;
        
        $end = microtime(true);
        
        Logging::debug("getting builder feed info took:");
        Logging::debug(floatval($end) - floatval($start));
    }

    public function scheduleAddAction() {

        $request = $this->getRequest();
        $mediaItems = $request->getParam("mediaIds", array());
        $scheduledItems = $request->getParam("schedIds", array());

        try {
            $scheduler = new Application_Model_Scheduler();
            $scheduler->scheduleAfter($scheduledItems, $mediaItems);
        }
        catch (OutDatedScheduleException $e) {
            $this->view->error = $e->getMessage();
            Logging::log($e->getMessage());
            Logging::log("{$e->getFile()}");
            Logging::log("{$e->getLine()}");
        }
        catch (Exception $e) {
            $this->view->error = $e->getMessage();
            Logging::log($e->getMessage());
            Logging::log("{$e->getFile()}");
            Logging::log("{$e->getLine()}");
        }
    }

    public function scheduleRemoveAction()
    {
        $request = $this->getRequest();
        $items = $request->getParam("items", array());

        try {
            $scheduler = new Application_Model_Scheduler();
            $scheduler->removeItems($items);
        }
        catch (OutDatedScheduleException $e) {
            $this->view->error = $e->getMessage();
            Logging::log($e->getMessage());
            Logging::log("{$e->getFile()}");
            Logging::log("{$e->getLine()}");
        }
        catch (Exception $e) {
            $this->view->error = $e->getMessage();
            Logging::log($e->getMessage());
            Logging::log("{$e->getFile()}");
            Logging::log("{$e->getLine()}");
        }
    }

    public function scheduleMoveAction() {

        $request = $this->getRequest();
        $selectedItems = $request->getParam("selectedItem");
        $afterItem = $request->getParam("afterItem");

        try {
            $scheduler = new Application_Model_Scheduler();
            $scheduler->moveItem($selectedItems, $afterItem);
        }
        catch (OutDatedScheduleException $e) {
            $this->view->error = $e->getMessage();
            Logging::log($e->getMessage());
            Logging::log("{$e->getFile()}");
            Logging::log("{$e->getLine()}");
        }
        catch (Exception $e) {
            $this->view->error = $e->getMessage();
            Logging::log($e->getMessage());
            Logging::log("{$e->getFile()}");
            Logging::log("{$e->getLine()}");
        }
    }

    public function scheduleReorderAction() {

        $request = $this->getRequest();

        $showInstance = $request->getParam("instanceId");
    }
}
