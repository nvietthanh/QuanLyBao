USE do_an;

INSERT INTO tac_gia
(
  ID_tac_gia
 ,Ma_tac_gia
 ,Ten_tac_gia
 ,Gioi_tinh
 ,SDT
 ,Nam_sinh
 ,Dia_chi
)
VALUES
(
  UUID() -- ID_tac_gia - CHAR(36) NOT NULL
 ,'TG001' -- Ma_tac_gia - CHAR(100) NOT NULL
 ,'Tác giả 01' -- Ten_tac_gia - VARCHAR(255) NOT NULL
 ,0 -- Gioi_tinh - SMALLINT NOT NULL
 ,'000000000' -- SDT - VARCHAR(255) NOT NULL
 ,NOW() -- Nam_sinh - DATE NOT NULL
 ,'Hà Nội' -- Dia_chi - VARCHAR(255) NOT NULL
);
INSERT INTO tac_gia
(
  ID_tac_gia
 ,Ma_tac_gia
 ,Ten_tac_gia
 ,Gioi_tinh
 ,SDT
 ,Nam_sinh
 ,Dia_chi
)
VALUES
(
  UUID() -- ID_tac_gia - CHAR(36) NOT NULL
 ,'TG002' -- Ma_tac_gia - CHAR(100) NOT NULL
 ,'Tác giả 02' -- Ten_tac_gia - VARCHAR(255) NOT NULL
 ,0 -- Gioi_tinh - SMALLINT NOT NULL
 ,'000000001' -- SDT - VARCHAR(255) NOT NULL
 ,NOW() -- Nam_sinh - DATE NOT NULL
 ,'Hà Nội' -- Dia_chi - VARCHAR(255) NOT NULL
);
INSERT INTO tac_gia
(
  ID_tac_gia
 ,Ma_tac_gia
 ,Ten_tac_gia
 ,Gioi_tinh
 ,SDT
 ,Nam_sinh
 ,Dia_chi
)
VALUES
(
  UUID() -- ID_tac_gia - CHAR(36) NOT NULL
 ,'TG003' -- Ma_tac_gia - CHAR(100) NOT NULL
 ,'Tác giả 01' -- Ten_tac_gia - VARCHAR(255) NOT NULL
 ,0 -- Gioi_tinh - SMALLINT NOT NULL
 ,'000000003' -- SDT - VARCHAR(255) NOT NULL
 ,NOW() -- Nam_sinh - DATE NOT NULL
 ,'Hà Nội' -- Dia_chi - VARCHAR(255) NOT NULL
);