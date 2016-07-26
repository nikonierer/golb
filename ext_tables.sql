#
# Table structure for table 'pages'
#
CREATE TABLE pages (
	tx_golb_subpages int(11) DEFAULT '0' NOT NULL,
  tx_golb_view_count int(11) DEFAULT '0' NOT NULL,
  tx_golb_related varchar(255) DEFAULT NULL,
  tx_golb_content_elements int(11) DEFAULT '0' NOT NULL,
  tx_golb_author_image int(11) unsigned DEFAULT '0'
);

#
# Table structure for table 'sys_category'
#
CREATE TABLE sys_category (
  tx_golb_sub_categories int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (
  tx_golb_sorting varchar(255) DEFAULT NULL,
  tx_golb_sorting_direction varchar(255) DEFAULT NULL,
  tx_golb_limit int(4) DEFAULT NULL,
  tx_golb_offset int(4) DEFAULT NULL,
  tx_golb_action varchar(40) DEFAULT '' NOT NULL,
  tx_golb_exclude varchar(40) DEFAULT '' NOT NULL,
  tx_golb_selected_pages int(11) DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_gks_ttcontent_pages'
#
CREATE TABLE tx_golb_ttcontent_pages_mm (
	uid int(11) NOT NULL auto_increment,
	uid_local int(11) NOT NULL default '0',
	uid_foreign int(11) NOT NULL default '0',
	tablenames varchar(30) NOT NULL default '',
	sorting int(11) NOT NULL default '0',
	sorting_foreign int(11) NOT NULL default '0',

	PRIMARY KEY  (uid),
	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);