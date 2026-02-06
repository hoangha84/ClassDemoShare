/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     4/6/2023 3:28:07 PM                          */
/*==============================================================*/
drop database if exists DemoBanHang;

create database DemoBanHang;

use DemoBanHang;

drop table if exists CHITIETHOADON;

drop table if exists DANHMUC;

drop table if exists HINHPB;

drop table if exists HINHSP;

drop table if exists HOADON;

drop table if exists KHACHHANG;

drop table if exists PHIENBANSP;

drop table if exists SANPHAM;

/*==============================================================*/
/* Table: CHITIETHOADON                                         */
/*==============================================================*/
create table CHITIETHOADON
(
   MAHD                 varchar(50) not null,
   MAPB                 varchar(50) not null,
   SOLUONG              int,
   DONGIA               int,
   primary key (MAHD, MAPB)
);

/*==============================================================*/
/* Table: DANHMUC                                               */
/*==============================================================*/
create table DANHMUC
(
   MADM                 varchar(50) not null,
   TENDM                varchar(50),
   THONGTINDM           varchar(200),
   primary key (MADM)
);

/*==============================================================*/
/* Table: HINHPB                                                */
/*==============================================================*/
create table HINHPB
(
   IDHINHPB             varchar(50) not null,
   MAPB                 varchar(50) not null,
   TEXTHINHPB           varchar(50),
   LINKHINHPB           text,
   primary key (IDHINHPB)
);

/*==============================================================*/
/* Table: HINHSP                                                */
/*==============================================================*/
create table HINHSP
(
   IDHINHSP             varchar(50) not null,
   MASP                 varchar(50) not null,
   TEXTHINHSP           varchar(50),
   LINKHINHSP           text,
   primary key (IDHINHSP)
);

/*==============================================================*/
/* Table: HOADON                                                */
/*==============================================================*/
create table HOADON
(
   MAHD                 varchar(50) not null,
   MAKH                 varchar(50) not null,
   NGAYMUA              date,
   DIACHIGIAOHANG       varchar(200),
   DIENTHOAIGIAOHANG    varchar(20),
   TONGTIEN             int,
   primary key (MAHD)
);

/*==============================================================*/
/* Table: KHACHHANG                                             */
/*==============================================================*/
create table KHACHHANG
(
   MAKH                 varchar(50) not null,
   HOTEN                varchar(50),
   NGAYTHAMGIA          date,
   HANGTHANHVIEN        varchar(50),
   DIEMTICHLUY          int,
   TENDANGNHAP          varchar(50),
   MATKHAU              varchar(50),
   EMAIL                varchar(200),
   DIENTHOAI            varchar(20),
   primary key (MAKH)
);

/*==============================================================*/
/* Table: PHIENBANSP                                            */
/*==============================================================*/
create table PHIENBANSP
(
   MAPB                 varchar(50) not null,
   MASP                 varchar(50) not null,
   TENPB                varchar(50),
   THONGTINPB           text,
   MAUSAC               varchar(50),
   GIABAN               int,
   SOLUONGTONKHO        int,
   primary key (MAPB)
);

/*==============================================================*/
/* Table: SANPHAM                                               */
/*==============================================================*/
create table SANPHAM
(
   MASP                 varchar(50) not null,
   MADM                 varchar(50) not null,
   TENSP                varchar(50),
   GIOITHIEUSP          varchar(200),
   THONGTINSP           text,
   GIADEXUAT            int,
   GIATHAPNHAT          int,
   HINHCOVER            text,
   primary key (MASP)
);

alter table CHITIETHOADON add constraint FK_CHITIETHOADON foreign key (MAPB)
      references PHIENBANSP (MAPB) on delete restrict on update restrict;

alter table CHITIETHOADON add constraint FK_CHITIETHOADON2 foreign key (MAHD)
      references HOADON (MAHD) on delete restrict on update restrict;

alter table HINHPB add constraint FK_PB_HA foreign key (MAPB)
      references PHIENBANSP (MAPB) on delete restrict on update restrict;

alter table HINHSP add constraint FK_SP_HA foreign key (MASP)
      references SANPHAM (MASP) on delete restrict on update restrict;

alter table HOADON add constraint FK_KH_HD foreign key (MAKH)
      references KHACHHANG (MAKH) on delete restrict on update restrict;

alter table PHIENBANSP add constraint FK_SP_PB foreign key (MASP)
      references SANPHAM (MASP) on delete restrict on update restrict;

alter table SANPHAM add constraint FK_DM_SP foreign key (MADM)
      references DANHMUC (MADM) on delete restrict on update restrict;

