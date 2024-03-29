<?php
    CroogoRouter::plugins();
    Router::parseExtensions('json', 'rss');

    // Installer
    if (!file_exists(CONFIGS.'settings.yml')) {
        CroogoRouter::connect('/', array('plugin' => 'install' ,'controller' => 'install'));
    }

    // Basic
    //CroogoRouter::connect('/', array('controller' => 'nodes', 'action' => 'promoted'));
	
	
	
	CroogoRouter::connect('http://payments.lifeleisureholidays.com', array('controller' => 'payments', 'action' => 'index'));
    CroogoRouter::connect('/', array('controller' => 'links', 'action' => 'index'));
    CroogoRouter::connect('/hotels/', array('controller' => 'hotels', 'action' => 'index'));
    CroogoRouter::connect('/promoted/*', array('controller' => 'nodes', 'action' => 'promoted'));
    CroogoRouter::connect('/admin', array('admin' => true, 'controller' => 'settings', 'action' => 'dashboard'));
    CroogoRouter::connect('/search/*', array('controller' => 'nodes', 'action' => 'search'));

    // Blog
    CroogoRouter::connect('/blog', array('controller' => 'nodes', 'action' => 'index', 'type' => 'blog'));
    CroogoRouter::connect('/blog/archives/*', array('controller' => 'nodes', 'action' => 'index', 'type' => 'blog'));
    CroogoRouter::connect('/blog/:slug', array('controller' => 'nodes', 'action' => 'view', 'type' => 'blog'));
    CroogoRouter::connect('/blog/term/:slug/*', array('controller' => 'nodes', 'action' => 'term', 'type' => 'blog'));

    // Node
    CroogoRouter::connect('/node', array('controller' => 'nodes', 'action' => 'index', 'type' => 'node'));
    CroogoRouter::connect('/node/archives/*', array('controller' => 'nodes', 'action' => 'index', 'type' => 'node'));
    CroogoRouter::connect('/node/:slug', array('controller' => 'nodes', 'action' => 'view', 'type' => 'node'));
    CroogoRouter::connect('/node/term/:slug/*', array('controller' => 'nodes', 'action' => 'term', 'type' => 'node'));

    // Page
    CroogoRouter::connect('/about', array('controller' => 'nodes', 'action' => 'view', 'type' => 'page', 'slug' => 'about'));
    CroogoRouter::connect('/page/:slug', array('controller' => 'nodes', 'action' => 'view', 'type' => 'page'));

    // Users
    CroogoRouter::connect('/register', array('controller' => 'users', 'action' => 'add'));
    CroogoRouter::connect('/user/:username', array('controller' => 'users', 'action' => 'view'), array('pass' => array('username')));

    // Contact
    CroogoRouter::connect('/contact', array('controller' => 'contacts', 'action' => 'view', 'contact'));
    
    //Advance search
    CroogoRouter::connect('/advanced_search/*', array('controller' => 'search', 'action' => 'index', 'ad_search'));
    
    //My account
    CroogoRouter::connect('/my_account/', array('controller' => 'myaccount', 'action' => 'index'));
    //CroogoRouter::connect('/my_purchases/', array('controller' => 'purchases', 'action' => 'my_purchases'));
    
  //  Router::connect('/fusion_charts/swf/:chart',array('plugin' => 'FusionCharts','controller' => 'swf','action' => 'proxy')); 
    
    Router::connect('/sitemap', array('controller' => 'sitemaps', 'action' => 'index')); 
	Router::connect('/sitemap/:action/*', array('controller' => 'sitemaps')); 
	Router::connect('/robots/:action/*', array('controller' => 'sitemaps', 'action' => 'robot'));
	
    Router::parseExtensions('rss', 'json', 'xml', 'pdf','csv'); // <-- add pdf somewhere in parseExtensions
?>