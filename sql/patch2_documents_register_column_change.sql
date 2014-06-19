ALTER TABLE `registers` ADD `mode_of_receipt` ENUM('In Person', 'eMail', 'Courier') NOT NULL AFTER `type`;

ALTER TABLE `documents` ADD `fin_year` INT NOT NULL DEFAULT '5' AFTER `by_employee`;

ALTER TABLE `inward_invoices` ADD `fin_year` INT NOT NULL DEFAULT '8' AFTER `date`;

ALTER TABLE `outward_invoices` ADD `fin_year` INT NOT NULL DEFAULT '8' AFTER `date`;

ALTER TABLE `outward_invoices` DROP `mode_of_receipt`;
ALTER TABLE `outward_invoices` ADD `mode_of_receipt` ENUM('In Person', 'eMail', 'Courier') NOT NULL DEFAULT 'In Person' AFTER `fin_year`;

ALTER TABLE `inward_invoices` ADD `mode_of_receipt` ENUM('In Person', 'eMail', 'Courier') NOT NULL DEFAULT 'In Person' AFTER `fin_year`;
ALTER TABLE `inward_invoices` DROP `mode_of_receipt`;

ALTER TABLE `documents` ADD `mode_of_receipt` ENUM('In Person', 'eMail', 'Courier') NOT NULL DEFAULT 'In Person' AFTER `fin_year`;

ALTER TABLE `documents` DROP `mode_of_receipt`;

ALTER TABLE `documents` DROP `quantity`;