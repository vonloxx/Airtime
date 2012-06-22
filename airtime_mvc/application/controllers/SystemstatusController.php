<?php

class SystemstatusController extends Zend_Controller_Action
{
    public function init()
    {
        global $CC_CONFIG;
        
        $baseUrl = dirname($_SERVER['SCRIPT_NAME']);
        if (strcmp($baseUrl, '/') ==0) $baseUrl = "";
        
        $this->view->headScript()->appendFile($baseUrl.'/js/airtime/status/status.js?'.$CC_CONFIG['airtime_version'],'text/javascript');
    }

    public function indexAction()
    {
        $services = array(
            "pypo"=>Application_Model_Systemstatus::GetPypoStatus(),
            "liquidsoap"=>Application_Model_Systemstatus::GetLiquidsoapStatus(),
            "media-monitor"=>Application_Model_Systemstatus::GetMediaMonitorStatus(),
            "rabbitmq-server"=>Application_Model_Systemstatus::GetRabbitMqStatus()
        );

        $partitions = Application_Model_Systemstatus::GetDiskInfo();
        
        $this->view->status = new StdClass;
        $this->view->status->services = $services;
        $this->view->status->partitions = $partitions;
    }
}
