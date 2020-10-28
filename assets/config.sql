


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



















  CREATE TABLE card
  (
    cnumber varchar ( 255 ) NOT NULL,
    cid varchar ( 255 ) NOT NULL,
    cvv varchar ( 255 ) NOT NULL,
    cexp_date DATE NOT Null,
    cissue_date DATE NOT NULL DEFAULT CURRENT_DATE,
    climit NUMERIC(8,2) DEFAULT 15000 NOT NULL,
    cbalance NUMERIC(8,2) DEFAULT 0 NOT NULL,
    PRIMARY KEY (cnumber),
    CONSTRAINT fk_cid
    FOREIGN KEY (cid)
      REFERENCES costumer (cid)
      ON DELETE CASCADE
  );


  CREATE TABLE transactions
  (
    tid SERIAL PRIMARY KEY,
    cnumber varchar ( 255 ) NOT NULL,
    ttype varchar ( 255 ) NOT  NULL,
    tdate TIMESTAMP
    WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
  tcat int DEFAULT 0,
  tamount NUMERIC
    (8,2) DEFAULT 0.00 NOT NULL,
  cbalance NUMERIC
    (8,2) DEFAULT 0.00 NOT NULL,
  description varchar
    ( 255 ) DEFAULT 'brief description for this transaction',
  CONSTRAINT fk_cnumber
    FOREIGN KEY
    (cnumber)
      REFERENCES card
    (cnumber)
      ON
    DELETE CASCADE
);

    CREATE TABLE checking
    (
      caccount SERIAL PRIMARY KEY,
      cid varchar ( 255 ) NOT NULL,
      caperture_date DATE NOT NULL DEFAULT CURRENT_DATE,
      cfund NUMERIC(8,2) DEFAULT 15000 NOT NULL,
      CONSTRAINT fk_cid
    FOREIGN KEY (cid)
      REFERENCES costumer (cid)
      ON DELETE CASCADE
    );

    CREATE TABLE cmpyID
    (
      cmpyID varchar ( 255 ) PRIMARY KEY NOT NULL,
      cmpyname varchar ( 255 )
    );

    SET TIMEZONE
    ='America/Guatemala';





    INSERT INTO transactions
      ( tid, cnumber, ttype, tdate, tcat, description )
    VALUES
      ( DEFAULT, '5138703018414458', 'debit', DEFAULT, DEFAULT, 'test transaction');

    SELECT LASTVAL();
