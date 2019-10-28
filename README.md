# restaurant-management-system
[this details are written here](https://github.com/rjarman/restaurant-management-system/blob/master/php/include/db.php)

## Database Description:
* **Database Name:** 'rms'
* **Server Name:** 'localhost'
* **User Name:** 'root'
* **Password:** ''

## Required Table:
* ```CREATE TABLE IF NOT EXISTS `food_item` (
            `id` int(11) NOT NULL auto_increment,   
            `set_menu_1` int(11) NOT NULL default '0',
            `set_menu_2` int(11) NOT NULL default '0',
            `set_menu_3` int(11) NOT NULL default '0',
            `set_menu_4` int(11) NOT NULL default '0',
            `chicken_burger` int(11) NOT NULL default '0',
            `beef_burger` int(11) NOT NULL default '0',
            `club_sandwitch` int(11) NOT NULL default '0',
            `sub_sandwitch` int(11) NOT NULL default '0',
            `cocacola` int(11) NOT NULL default '0',
            `sprite` int(11) NOT NULL default '0',
            `pepsi` int(11) NOT NULL default '0',
            `fanta` int(11) NOT NULL default '0',
            `total_sell` int(11) NOT NULL default '0',
             PRIMARY KEY  (`id`)
          );```

* ```CREATE TABLE IF NOT EXISTS `employee` (
            `id` int(11) NOT NULL auto_increment,   
            `employee_name` varchar(255) NOT NULL default '0',
            `post_title` varchar(255) NOT NULL default '0',
            `working_type` varchar(255) NOT NULL default '0',
             PRIMARY KEY  (`id`)
          );```

* ```CREATE TABLE IF NOT EXISTS `employee_details` (
            `id` int(11) NOT NULL auto_increment,   
            `employee_name_daily` varchar(255) NOT NULL default '0',
            `post_title_daily` varchar(255) NOT NULL default '0',
            `working_type_daily` varchar(255) NOT NULL default '0',
            `salary` int(11) NOT NULL default '0',
            `time_from` varchar(255) NOT NULL default '0',
            `time_to` varchar(255) NOT NULL default '0',
            `total_day` int(11) NOT NULL default '0',
            PRIMARY KEY  (`id`)
        );```
* ```CREATE TABLE IF NOT EXISTS `paid_salary` (
            `id` int(11) NOT NULL auto_increment,   
            `employee_name_daily` varchar(255) NOT NULL default '0',
            `salary` int(11) NOT NULL default '0',
            PRIMARY KEY  (`id`)
        );```
* ```CREATE TABLE IF NOT EXISTS `buyer_details` (
            `id` int(11) NOT NULL auto_increment,   
            `date` varchar(255) NOT NULL default '0',
            `buyer_name` varchar(255) NOT NULL default '0',
            `address` varchar(255) NOT NULL default '0',
            `goods` varchar(255) NOT NULL default '0',
            `measure` varchar(255) NOT NULL default '0',
            `fees` int(11) NOT NULL default '0',
            PRIMARY KEY  (`id`)
        );```
* ```CREATE TABLE IF NOT EXISTS `paid_buyer` (
            `id` int(11) NOT NULL auto_increment,   
            `buyer_name` varchar(255) NOT NULL default '0',
            `fees` int(11) NOT NULL default '0',
            `paid_status` int(11) NOT NULL default '0',
            PRIMARY KEY  (`id`)
        );```
