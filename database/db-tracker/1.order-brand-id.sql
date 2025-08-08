-- order TABLE brand_id added
ALTER TABLE `orders` ADD `brand_id` BIGINT NULL DEFAULT NULL AFTER `invoice_number`;
UPDATE orders SET brand_id = 1;



