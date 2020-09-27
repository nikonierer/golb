#
# Table structure for table 'pages'
#
CREATE TABLE pages (
    tx_golb_subpages int(11) DEFAULT '0' NOT NULL,
    tx_golb_view_count int(11) DEFAULT '0' NOT NULL,
    tx_golb_related varchar(255) DEFAULT NULL,
    tx_golb_content_elements int(11) DEFAULT '0' NOT NULL,
    tx_golb_publish_date int(11) DEFAULT '0' NOT NULL,
    tx_golb_authors int(11) DEFAULT '0' NOT NULL,
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
    tx_golb_exclude varchar(40) DEFAULT '' NOT NULL
);

#
# Table structure for table 'fe_users'
#
CREATE TABLE fe_users (
    tx_golb_author int(11) DEFAULT '0' NOT NULL
);

#
# Table structure for table 'tx_golb_fe_users_pages_mm'
#
CREATE TABLE tx_golb_pages_author_mm (
  uid_local int(11) DEFAULT '0' NOT NULL,
  uid_foreign int(11) DEFAULT '0' NOT NULL,
  sorting int(11) DEFAULT '0' NOT NULL,
  sorting_foreign int(11) DEFAULT '0' NOT NULL,

  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);

#
# Table structure for table 'tx_golb_domain_model_author'
#
CREATE TABLE tx_golb_domain_model_author (
  uid int(11) NOT NULL auto_increment,
  pid int(11) DEFAULT '0' NOT NULL,
  tstamp int(11) DEFAULT '0' NOT NULL,
  crdate int(11) DEFAULT '0' NOT NULL,
  cruser_id int(11) DEFAULT '0' NOT NULL,
  sorting int(11) DEFAULT '0' NOT NULL,
  deleted tinyint(4) DEFAULT '0' NOT NULL,
  hidden tinyint(4) DEFAULT '0' NOT NULL,
  t3ver_oid int(11) DEFAULT '0' NOT NULL,
  t3ver_id int(11) DEFAULT '0' NOT NULL,
  t3_origuid int(11) DEFAULT '0' NOT NULL,
  t3ver_wsid int(11) DEFAULT '0' NOT NULL,
  t3ver_label varchar(30) DEFAULT '' NOT NULL,
  t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
  t3ver_stage tinyint(4) DEFAULT '0' NOT NULL,
  t3ver_count int(11) DEFAULT '0' NOT NULL,
  t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
  t3ver_move_id int(11) DEFAULT '0' NOT NULL,
  sys_language_uid int(11) DEFAULT '0' NOT NULL,
  l18n_parent int(11) DEFAULT '0' NOT NULL,
  l18n_diffsource mediumblob NOT NULL,

  name varchar(255) DEFAULT '' NOT NULL,
  email varchar(255) DEFAULT '' NOT NULL,
  website varchar(255) DEFAULT '' NOT NULL,
  frontend_user int(11) DEFAULT '0' NOT NULL,
  images int(11) DEFAULT '0' NOT NULL,
  posts int(11) DEFAULT '0' NOT NULL,
  description text,

  PRIMARY KEY (uid),
  KEY parent (pid),
  KEY sys_language_uid_l18n_parent (sys_language_uid,l18n_parent),
);
