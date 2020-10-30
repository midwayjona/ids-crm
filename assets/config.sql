


CREATE DATABASE ids_crm;
CREATE USER 'ids_crm_su'@'%' IDENTIFIED
WITH mysql_native_password BY 'crmpass';
GRANT ALL ON ids_crm.* TO 'ids_crm_su'@'%';




CREATE TABLE costumer
(
  nit varchar ( 255 ) PRIMARY KEY NOT NULL,
  dpi varchar ( 255 ) NOT NULL,
  cname varchar ( 255 ),
  cdob DATE NOT NULL,
  cphone varchar ( 255 ),
  caddress varchar ( 255 ),
  cemail varchar ( 255 ),
  ccompany varchar ( 255 ),
  cuser varchar ( 255 ),
  cpassword varchar ( 255 ),
  cadmin BOOLEAN NOT NULL DEFAULT FALSE
);



CREATE TABLE cstatus
(
  nit varchar ( 255 ) PRIMARY KEY NOT NULL,
  cstatus int NOT NULL DEFAULT 0,
  pqd int NOT NULL DEFAULT 0,
  pqs int NOT NULL DEFAULT 0,
  CONSTRAINT fk_nit
  FOREIGN KEY (nit)
   REFERENCES costumer (nit)
   ON DELETE CASCADE
);

CREATE TABLE sale
(
  sale_id SERIAL PRIMARY KEY,
  store_id int NOT NULL,
  poit_of_sales_id int NOT NULL,
  invoice_id int NOT NULL,
  nit varchar ( 255 ),
  externally_created boolean NOT NULL,
  total float NOT NULL,
  total_discount float NOT NULL,
  total_sale float NOT NULL,
  sstatus varchar ( 255 ) NOT NULL DEFAULT 'PROCESSING',
  is_delivery boolean NOT NULL DEFAULT FALSE,
  created_at TIMESTAMP NOT NULL DEFAULT (CURRENT_DATE),
  created_by varchar ( 255 ) NOT NULL,
  updated_at TIMESTAMP NOT NULL DEFAULT (CURRENT_DATE),
  updated_by varchar ( 255 ) NOT NULL,
  CONSTRAINT fk_snit
  FOREIGN KEY (nit)
   REFERENCES costumer (nit)
   ON DELETE CASCADE
);

CREATE TABLE ticket 
(
  tid SERIAL PRIMARY KEY,
  nit varchar ( 255 ) NOT NULL,
  msg varchar ( 255 ) NOT NULL,
  created TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
  tstatus int NOT NULL DEFAULT 0,
  CONSTRAINT fk_nit_ticket
  FOREIGN KEY (nit)
   REFERENCES costumer (nit)
   ON DELETE CASCADE
);

CREATE TABLE ticket_comment
(
  t_cid SERIAL PRIMARY KEY,
  tid int NOT NULL,
  ucid int NOT NULL,
  msg varchar ( 255 ) NOT NULL,
  created TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_ticket
  FOREIGN KEY (tid)
   REFERENCES ticket (tid)
   ON DELETE CASCADE
);


INSERT INTO ticket(nit, msg)
VALUES (
  '12345678',
  'Farnes wont work tho'
);

INSERT INTO ticket_comment(tid, ucid, msg)
VALUES (
  '3',
  '0',
  'Okay, fuck you then'
);

INSERT INTO costumer (nit, dpi, cname, cdob, cphone, caddress, cemail, ccompany, cuser, cpassword, cadmin)
VALUES(
  '12345678',
  '1234567891234',
  'Joseph Joestar',
  '1995-08-05',
  '12345678',
  'Seattle, WA 96478',
  'joseph@mail.com',
  'Galileo',
  'demo',
  '$2y$10$NvhAfolog8y7/yPNyp4OaOF7NAT3J6U8491iLFVaN2huYpJXG5QrW',
  DEFAULT
);

INSERT INTO costumer (nit, dpi, cname, cdob, cphone, caddress, cemail, ccompany, cuser, cpassword, cadmin)
VALUES(
  '87654321',
  '7894561231234',
  'Robert Speedwagon',
  '1995-08-05',
  '98654795',
  'Seattle, WA 96478',
  'admin@crm.com',
  'CRM',
  'admin',
  '$2y$10$zBpGA2CuBHNWFtE6N.BCveRv3ptzs1obTliHQafGq155defThKf3G',
  TRUE
);

INSERT INTO cstatus (nit, cstatus, pqd, pqs)
VALUES(
  '12345678',
  DEFAULT,
  DEFAULT,
  DEFAULT
);

INSERT INTO sale (store_id, poit_of_sales_id, invoice_id, nit, externally_created, total, total_discount, total_sale, sstatus, is_delivery, created_at, created_by, updated_at, updated_by)
VALUES (
  123,
  456,
  654321,
  '12345678',
  FALSE,
  1500,
  375,
  1125,
  DEFAULT,
  DEFAULT,
  DEFAULT,
  'cashier',
  DEFAULT,
  'cashier'
);







