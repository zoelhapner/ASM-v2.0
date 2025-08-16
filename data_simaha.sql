--
-- PostgreSQL database dump
--

-- Dumped from database version 14.18
-- Dumped by pg_dump version 14.18

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: employees; Type: TABLE; Schema: public; Owner: postgres
--


ALTER TABLE public.employees OWNER TO postgres;

--
-- Name: license_holders; Type: TABLE; Schema: public; Owner: postgres
--



ALTER TABLE public.license_holders OWNER TO postgres;

--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--


ALTER TABLE public.users OWNER TO postgres;

--
-- Data for Name: employees; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.employees (id, user_id, nik, fullname, nickname, gender, birth_place, birth_date, marital_status, religion_id, identity_number, address, province_id, city_id, district_id, sub_district_id, postal_code_id, phone, "position", department, unit, employment_status, start_date, basic_salary, allowance, deduction, bonus, thr, contract_letter_file, photo, instructure_certificate, identity_photo, expired_date_certificate) FROM stdin;
ece1560a-b789-4c32-b2e3-e531f7917fc8	86ab2a26-602b-49be-bf26-0a20af0c09a7	3259010003	Durotun Nasiin	Nasiin	2	TULUNGAGUNG	1998-01-27	1	1	3504086701980001	DSN. GROGOL, DS. BUNGUR	15	229	3262	40898	40898	6282257983244	"[\\"Staff\\"]"	\N	\N	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
d084fe69-7dc4-4c53-978a-65b3feaa1fec	c0668550-76e7-4afd-80a0-163e32fb20b8	3259010004	Ristiana	Risti	2	TULUNGAGUNG	1999-09-16	1	1	3504024811990001	RT/RW 002/002, DSN. SOMOTELENG, DS. PODOREJO	15	229	3257	40819	40819	6285643077869	"[\\"Staff\\"]"	\N	\N	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
61d1bc76-2893-408e-9902-d42432567c2a	9166c631-93b4-47f3-8a50-4ff812fd97af	343005	JULIA TANTI RISTIANDA	\N	2	Nganjuk	1997-07-27	2	1	3518066707970003	DSN. GROPYOK 04/03 DS. TANON KEC. PAPAR KAB. KEDIR	15	231	3307	\N	\N	82120458188	["Staff"]	["Staff"]	["Staff"]	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
ea5c05e2-3952-4aac-b02c-8b083850ed37	270ebcc1-19b4-4b52-a61c-f20abf943bb2	362002	Tri Atarini	Tri	2	Tulungagung	1995-10-10	2	1	3504125010950001	Jl. Kimangun Sarkoro, Ds. Beji, Kec. Boyolangu, Kab. Tulungagung.	15	229	3258	40836	40836	6289602586757	"[\\"Staff\\"]"	"[\\"Produksi\\"]"	"[\\"Event\\"]"	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
9051f97b-1fdb-46ef-aa46-a9bb5a91ad76	ae2deadf-2f6a-4214-8ea1-51014b03f540	3582010001	Lailatul Murdiana	Laila	2	Nganjuk	1994-04-25	2	1	3518156504940002	Dusun Dawuhan, RT 04 / RW 02, Desa Mancon, Kecamatan Wilangan, Kabupaten Nganjuk	15	243	3584	44855	44855	6282257607801	"[\\"Staff\\"]"	\N	\N	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
14f92506-d061-4bc7-b259-93e1cf99ead7	87347db9-2dc3-452e-8f65-332ae2276d0a	3259010001	Arinda Senja Riani	Senja	2	TULUNGAGUNG	1991-09-06	2	1	3504014609910001	JL. MT HARYONO V/14C	15	229	3259	40854	40854	6285735123422	"[\\"Direktur\\"]"	"[\\"Keuangan\\"]"	"[\\"Lisensi\\"]"	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
3bef0155-012a-406d-b9bd-973ef7ebceb2	06925901-2dd5-4fce-90f4-5628eac97cd7	3259010005	Yusrina Dzakiroh	Yusri	2	TULUNGAGUNG	1999-11-10	1	1	3504015011990002	JL. MT HARYONO 5 NO. 24-B, KEL. BAGO	15	229	3259	40857	40857	6281555986462	"[\\"Staff\\"]"	\N	\N	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
f88b556f-1d6a-4392-9e3c-8a57dc5d856d	248a9f17-bd6c-426e-92d4-a34bf222a694	3259010002	Rini Widya Lestari	Rini	2	LAMPUNG TIMUR	2000-01-07	1	1	3504184107000021	RT/RW 01/03 DS.KASREMAN KEC.PAKEL	15	229	3250	40735	40735	6281338154702	"[\\"Staff\\"]"	\N	\N	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
2af324bb-66b2-4850-ba80-de3c61ea05e1	586b9e48-2ac9-4021-9ea9-784bdce9d284	3582010005	Ika	ika	2	bagor	1990-01-01	2	1	3509191202980003	Dusun Ngrombot, RT 07 / RW 04 , Desa Selorejo	15	243	3583	44832	44832	6283827104825	"[\\"Staff\\"]"	\N	\N	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
ee6ccd27-3ca1-49cf-9076-0b930cbcb1f0	d4f71b70-ef39-47ce-83e3-18505f0c57fd	3582010002	Siti Ummahatul Fitriyah	Siti	2	Nganjuk	2004-11-18	1	1	3518155811040001	Dusun Ngudikan, RT 03 / RW 02, Desa Ngudikan	15	243	3584	44856	44856	6281615527480	"[\\"Staff\\"]"	\N	\N	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
1429caa0-da42-41d5-91fa-eed5fd629a67	bca0272f-65cf-4005-8ed9-88a21caf6c67	3259010006	Melinia Sintia Ningtyas	Meli	2	TULUNGAGUNG	2000-01-01	2	1	3504024101000002	JL. GANG CANDI GAYATRI DUSUN DADAPAN RT 01 RW 02 DESA BOYOLANGU	15	229	3258	40837	40837	6285951648807	"[\\"Staff\\"]"	\N	\N	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
5551ffd8-8365-43ea-839d-ca8cbf00e6a2	6a7f85a2-b208-487d-8754-ac502bf54b43	3582010003	Ria Yuli Wahyu Wilujeng	Ria	2	Nganjuk	2001-07-02	1	1	3518144208010001	Dusun Ngrombot, RT 07 / RW 04 , Desa Selorejo	15	243	3583	44841	44841	6181216556589	"[\\"Staff\\"]"	\N	\N	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
a3e49b59-3f67-4da2-bd0c-7027d65df8fe	3402dd5a-661f-4b50-a8e4-352c8caf30e4	3575010003	Ratna Utari Dewi	ratna	2	Nganjuk	1971-03-14	2	1	3515145403710004	Dsn. Jimbir Ds. Sugihwaras Prambon	15	243	3576	44740	44740	6281331596927	"[\\"Supervisor\\"]"	"[\\"Keuangan\\"]"	\N	Tetap	2017-03-18	650000.00	100000.00	0.00	0.00	300000.00	contracts/8tVh56dQEROeqtmX3BG5jHzUknWCufg6tx0F1h4Y.pdf	\N	certificates/d59909e1-bbab-485d-8c42-3fa73534ef68_Praktek.pdf	\N	\N
c1773d27-7433-4331-b196-8180946602ca	525149cf-73ba-4372-9dbd-bd61518a6fdd	3582010004	Putri Ibah Apriliani	Putri	2	Riam Tapang	2000-04-27	1	1	3518156704000001	Dusun Ngudikan, RT 03 / RW 02, Desa Ngudikan	15	243	3584	44856	44856	6282334395442	"[\\"Staff\\"]"	\N	\N	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
4d17d62c-c4a6-4e51-ba63-36af6200aa9f	ff0a8813-7647-449f-9e4d-f2a40025f3d8	3575010004	Beddy Luqman Hakim	Luqman	1	Nganjuk	1991-12-15	1	1	0000000000000000	ds. Tanjungkalang kec. Ngronggot kab. Nganju	15	243	3576	44739	44739	85708454059	"[\\"Staff\\"]"	\N	\N	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
e8ff022c-f755-49e7-b9a1-e5f2fd5bdff8	db4e8b48-3594-4614-83a7-33666e277544	343006	Inin Saroh	\N	2	Nganjuk	1979-04-04	2	1	0	Dsn.watudandang,kec prambon,kab.nganjuk	15	243	3513	\N	\N	85706683063	["Staff"]	["Staff"]	["Staff"]	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
71f28d08-eed6-4dce-9929-40d1e681c7ed	9f82bb4a-0c6a-4f5c-9735-844d242aeede	343007	Kurnia Agustina Devanti	\N	2	Nganjuk	1998-08-19	1	1	3518065908980001	Ds. Sanggrahan, Kec. Prambon, Kab. Nganjuk	15	243	3513	\N	\N	085-853-436-101	["Staff"]	["Staff"]	["Staff"]	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
be89c974-2697-4355-aebe-1ceaaaf690b4	cb5bee6d-a33d-4fd4-9418-42ecd4662709	343008	LILLA WAHYU SEPRIYAN PUTRI	\N	2	Nganjuk	2001-09-25	1	1	3518066509010002	Ds. Sanggrahan, Kec. Prambon, Kab. Nganjuk	15	243	3513	\N	\N	81615932557	["Staff"]	["Staff"]	["Staff"]	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
1857a18c-014e-4d16-a5c6-c69cfcfc7e00	4f23cd15-466f-47b1-88d1-1a7496109889	343009	Aprilia Dewi Elvitasari	\N	2	Nganjuk	1999-04-30	2	1	3518067004990003	Dsn. Watudandang RT. 03 / RW. 12 Ds. Watudandang Kec. Prambon Kab. Nganjuk	15	243	3513	\N	\N	0821 4085 7032	["Staff"]	["Staff"]	["Staff"]	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
28cea1a8-987b-4017-ad73-92b46317a0ea	e674522e-f9c4-410c-aa13-b84d440ad092	343010	Afina Ulin Nuha	\N	2	Nganjuk	1999-09-03	2	1	3518074903990001	Ds. Cengkok Dsn. Kedonglo 011/017 kec. ngronggot kab. Nganjuk	15	243	3576	\N	\N	85856437322	["Staff"]	["Staff"]	["Staff"]	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
e84e4d57-b8ce-4674-9331-84eaead71b88	17cf9c76-034d-4c86-be22-517658b4160d	343011	Pratiwi	\N	2	nganjuk	1997-05-16	1	1	3518045605970002	Dusun Glagahan Desa Tekengalagahan kecamatan Loceret Kabupaten Nganjuk	15	243	3572	\N	\N	85645792677	["Staff"]	["Staff"]	["Staff"]	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
98c1ae2c-2c4a-445e-b660-e3199c3bba0f	8c65c378-ecce-4162-ae77-826b87b5b6e3	3259010009	Novita Dewi Rahmawati	Dewi	2	TULUNGAGUNG	1997-11-26	1	1	3504016611970001	JL. I GUSTI NGURAH RAI 2 NO. 31	15	229	3259	40854	40854	6282232971696	"[\\"Staff\\"]"	\N	\N	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
a957cf50-0777-48f6-864e-063eb535736f	24b82a3b-015f-4f7f-807c-4ea86e1a33c3	3259010007	Triana May Latul Anisa	May	2	TULUNGAGUNG	2000-05-11	1	1	3504185105000001	RT/RW 01/06 DSN. KRAJAN, DS. GESIKAN	15	229	3250	40740	40740	6285236615202	"[\\"Staff\\"]"	\N	\N	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
bd75269d-97ae-4604-b539-dba0e42e8675	65688cce-bb9e-4580-b946-ed4ca6f9d8f2	3259010008	Fera Dwi Safitri	Fera	2	TULUNGAGUNG	1995-02-25	1	1	3504166502950004	RT/RW 03/01, DSN. GLOTAN, DS. TANGGUNG	15	229	3251	40750	40750	6282335230710	"[\\"Staff\\"]"	\N	\N	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
ca0dce8a-2f9b-4665-9a7a-e95cb2b55282	7b956aa4-77d8-4259-9c67-6ad09de3db38	3259010010	Amrika Ely Windayani	Ely	2	TULUNGAGUNG	1987-04-11	2	1	3504025104870003	RT/RW 01/02, DS. BAGOR KULON, KEC. BAGOR, NGANJUK	15	243	3583	44837	44837	628819068579	"[\\"Staff\\"]"	\N	\N	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
b22a3c30-70d5-41d8-b1cc-617f824ef975	14c18502-5a8c-44bd-9061-a0c5398be587	3259010011	Rindang Arumsari	Rindang	2	-	1990-01-01	2	1	0000000000000000	-	15	229	3261	40888	40888	0	"[\\"Staff\\"]"	\N	\N	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
1c3574a5-165f-4e97-9d85-073eb980dd9a	a9dc3fcf-e8cc-480e-b0e7-a4fe4e721f36	3259010012	Bidayatul Hasanah	Hasanah	2	TULUNGAGUNG	1992-05-19	2	1	3504045905920002	DS. POJOK, KEC. NGANTRU	15	229	3261	40893	40893	6285655488270	"[\\"Staff\\"]"	\N	\N	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
ad0b963f-b565-472c-afcc-3483f38c7e55	ce377435-235e-4e0e-9275-33f9d8eddb2f	3259010013	Nurul Khabibah	Nurul	2	TULUNGAGUNG	1995-07-16	2	1	3504135607950001	DS. TANEN, KEC. REJOTANGAN	15	229	3255	40789	40789	6285749189923	"[\\"Staff\\"]"	\N	\N	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
3df46555-f66d-4125-93c0-e9b9a1a93429	d6b1ce47-63f3-468f-9a64-7a3d4422049b	3259010014	Nita Hidayatul Karfiza	Nita	2	TULUNGAGUNG	1996-04-04	2	1	3504134404960002	DSN. PELANG, DS. BANJAREJO	15	229	3255	40794	40794	6285736216914	"[\\"Staff\\"]"	\N	\N	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
d0e60954-d06f-4fc3-aed2-83f10fcd35dd	eb35f077-b854-4e1b-878c-4bd39267ce39	3259010015	Eva Fitria	Eva	2	TULUNGAGUNG	1996-02-16	2	1	0000000000000000	DS. BUNTARAN, KEC. REJOTANGAN	15	229	3255	40797	40797	6285708038676	"[\\"Staff\\"]"	\N	\N	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
3a4d147c-3ecb-40d6-8917-5ea46b2e0387	cb878da7-ecb6-41f9-99e3-6bfeab9e6d53	3259010016	Umi Kiptida'iyah	Umi	2	TULUNGAGUNG	1992-07-20	2	1	0000000000000000	DSN. MANGGISAN, DS. PLOSOKANDANG	15	229	3260	40866	40866	6281229873309	"[\\"Staff\\"]"	\N	\N	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
d39f5e8c-7abf-4dc4-8bee-02a365aec8a4	17729f28-5451-4619-af31-e4192f819e64	3259010017	Agustina Eka Saputri	Eka	2	TULUNGAGUNG	1997-08-22	2	1	3504106208970001	DS. SUMBERDADI, KEC. SUMBERGEMPOL	15	229	3257	40831	40831	6285731583031	"[\\"Staff\\"]"	\N	\N	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
1b5f0851-91d8-4df6-baa8-a6d6cb6150c4	ea0c3152-5e9d-4eac-9a23-8aab14762aa9	3256010001	Miftahul Khoiriyah	Miftahul	2	Blitar	1987-06-02	2	1	3505124602870002	Desa Sumberingin Kidul, Kec. Ngunut, Kabupaten Tulungagung, Jawa Timur 66292	15	229	3256	40807	40807	6285749121579	"[\\"Staff\\"]"	\N	\N	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
c111e56e-5abc-4ffc-bf9e-c7d4dca6e4ec	b924d2d8-ad9d-43e6-82f3-36d2877577e2	3256010002	Trisna Choiriyah	Trisna	2	Tulungagung	1990-01-01	2	1	0000000000000000	Desa Sumberingin Kidul, Kec. Ngunut, Kabupaten Tulungagung, Jawa Timur 66292	15	229	3256	40807	40807	6282132955155	"[\\"Staff\\"]"	"[\\"Produksi\\"]"	"[\\"Event\\"]"	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
6a4d2c8f-fa1b-4068-b27e-775bf9c59399	75b1a962-938b-4870-8541-57338b35876d	3575010001	Alfiyah, S.pd.	Alfiyah	2	Nganjuk	1987-04-29	2	1	3518116904870002	Ds. Watudandang Kec. Prambon Kab. Nganjuk	15	243	3574	44711	44711	6285859697977	"[\\"Staff\\"]"	\N	\N	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
91f3c8f1-8022-4417-9b35-7f2aded6f6b5	6bb5ba8f-720d-4cd4-adb3-185e34334cf5	3575010002	Mochamad Sholehudin	Soleh	1	Nganjuk	1979-01-05	2	1	3518110501790004	Ds. Watudandang Kec. Prambon Kab. Nganjuk	15	243	3574	44711	44711	6285608414647	"[\\"Staff\\"]"	\N	\N	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
00787f27-497d-4056-b6ce-b57d81f8d1ad	bcdbd76b-f140-4250-b229-cb623923ec6c	3256010003	Maslukhatul Widat	Widat	2	Johor Bahru	2001-07-04	1	1	3575024704010007	Desa Sumberingin Kidul, Kec. Ngunut, Kabupaten Tulungagung, Jawa Timur 66292	15	229	3256	40807	40807	6288235994159	"[\\"Staff\\"]"	"[\\"Produksi\\",\\"Keuangan\\"]"	\N	Tetap	2025-01-01	0.00	0.00	0.00	0.00	0.00	\N	\N	\N	\N	\N
0c9b3a89-3401-4190-b4a5-85827e358152	eba0cb8d-f4ec-41fa-b500-1efed9882d3e	3534010002	Tri Atarini	Tri	2	Tulungagung	1995-10-10	2	1	3504125010950001	Jl. Kimangun Sarkoro, Ds. Beji, Kec. Boyolangu, Kab. Tulungagung.	15	229	3258	40846	40846	6289602586757	"[\\"Staff\\"]"	"[\\"Marketing\\"]"	"[\\"Event\\"]"	Kontrak	2017-03-15	300000.00	200000.00	0.00	100000.00	100000.00	contracts/fdf3e2a1-2d60-4ac7-9a43-df18d6341e14_LJK Baru fix .pdf	photos/ov3mr1JMWWue1EHh3XBKJjK5mHqqiam5La5IIbuG.jpg	certificates/d3d0f490-95e1-4287-b09f-bd05c1828789_Tn. Achmad Zulkifli JPA 179-23.pdf	photos/zYtEg2Q9uQGn5gXzRWIdGsXOFJCYcu7zDrcQjHR2.jpg	\N
672fc8aa-3dab-43a6-b091-7047383e585f	a268dd3d-e868-4c0a-b70d-b3c8bfccf6f9	3399010001	mohammad imron	imron	1	jember	1997-07-22	1	1	3509192207970002	hayam wuruk	15	234	3397	42380	42380	62871652	["Staff"]	["Keuangan"]	["Pengadaan"]	Kontrak	2025-02-12	0.00	0.00	0.00	0.00	0.00	contracts/66aaeb06-ebb3-462f-a96f-20aa4e6735f2_Aplikasi SIM AHA.pdf	\N	\N	\N	\N
f5618f33-239e-45e9-9087-dd633ec46ffe	357601c9-bef8-4dd9-9085-edc37234c25f	0000010001	Otaka Arya	Arya	1	Jember	1970-01-01	2	1	0000000000000000	-	15	234	3397	42382	42382	6285122391669	["Komisaris"]	["Networking","Produksi","Keuangan","HR","Marketing"]	["Lisensi"]	Tetap	2010-01-01	0.00	0.00	0.00	0.00	0.00	contracts/dc9e1b18-d197-4d10-952b-32d9d9c125f8_JADWAL KELAS 1A (1) (1).pdf	\N	\N	\N	\N
529a7544-e778-4fef-9bc0-af152a6d2abc	b2c2d4b6-d439-4e6c-a9d0-f0f3a3e51d5a	0000010002	Mutia Azzahra	Tia	2	Jember	1997-01-01	1	1	0000000000000000	-	15	234	3397	42382	42382	62851123564	["Direktur","Manager"]	["Produksi","Keuangan","HR"]	["Training"]	Tetap	2019-01-01	0.00	0.00	0.00	0.00	0.00	contracts/7c43a09d-9ca9-4025-89e7-f5e8cd194761_JADWAL KELAS 1A (1) (1).pdf	\N	\N	\N	\N
ddf1ba5f-5a7e-464c-8191-28a0e5b3ccd7	afacddc4-37f6-48e7-8b2a-7b9d86971a7f	0000010003	Achmad Zulkifli Nur Rochim	Zulkifli	1	Surabaya	1995-01-01	2	1	0000000000000000	-	15	234	3398	42388	42388	62871623	["Manager"]	["Networking"]	["Lisensi"]	Tetap	2019-01-01	0.00	0.00	0.00	0.00	0.00	contracts/7aef7686-1ba6-4bd7-b447-83595f37bafb_Tn. Achmad Zulkifli JPA 179-23.pdf	\N	\N	\N	\N
f5099abe-700a-4e16-9764-7e3f53c4d096	cc04ad2c-c2d6-4755-a48a-46827e4be880	0000010004	Salsa	Salsa	2	Jember	2000-01-01	1	1	0000000000000000	-	15	234	3397	42382	42382	6287165	["Staff"]	["Produksi"]	["Lisensi","Pengadaan"]	Kontrak	2022-02-01	0.00	0.00	0.00	0.00	0.00	contracts/f71ff91f-3545-4b2d-a5ee-1d76545cf461_JADWAL KELAS 1A (1) (1).pdf	\N	\N	\N	\N
\.


--
-- Data for Name: license_holders; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.license_holders (id, user_id, fullname, nickname, gender, religion_id, identity_number, driver_license_number, birth_place, birth_date, address, province_id, city_id, district_id, sub_district_id, postal_code_id, phone, hobby, marital_status, married_date, indonesian_literacy, indonesian_proficiency, arabic_literacy, arabic_proficiency, english_literacy, english_proficiency, photo, identity_photo) FROM stdin;
0f920a60-2fa6-4493-96f8-5e3f8d0816b1	b7b4990a-f9d9-4a31-bd95-263305ce5f24	Ririn Purwaningsih		2	1	3504146502870001		Tulungagung	1987-02-25	Dsn Karangsono,RT 02/RW 01 Desa.Karangtalun Kec. Kalidawir	\N	\N	\N	\N	\N	6281517216398	mengajar	2	\N	\N	\N	\N	\N	\N	\N	\N	\N
15c31939-2abe-4594-8358-27c0f496e95f	ae1ef2ef-cece-436a-a04e-ce55c0c9b9a3	Mochamad Sholehudin		1	1	3518116904870002		Nganjuk	1987-04-29	Ds. Watudandang Kec. Prambon Kab. Nganjuk	\N	\N	\N	\N	\N	6285859697977	MEMBACA	2	\N	\N	\N	\N	\N	\N	\N	\N	\N
a61511ec-ac63-4830-a54e-ff30b3616c9c	9fedfb47-b691-439a-88db-1ac85ecf66c8	Akhmad Syaifudin		1	1	0		Lamongan	1990-09-16	Jl.masjid Rt.02 Rw.03 Karangkembang Babat-Lamongan.	\N	\N	\N	\N	\N	6285648073423	traveling	2	\N	\N	\N	\N	\N	\N	\N	\N	\N
0e889b7d-8881-472c-933e-4a7d19b0fb5e	e025ad70-da84-4dc4-895a-d933c529550a	Dwi Masita Widyaningsih		2	1	3578145801800002		Surabaya	1980-01-18	Jl. Raci I no.2 Benowo, Surabaya, Jawa Timur	\N	\N	\N	\N	\N	6282243312758	mengajar	2	\N	\N	\N	\N	\N	\N	\N	\N	\N
5ddd21d5-90aa-42d3-8164-ed8680bdeb8c	b88c39f1-d6c2-4597-93a1-5dfe7ed6e52f	Miftahur rohmah		2	1	0		Wonodadi	1971-03-08	Wonodadi	\N	\N	\N	\N	\N	6289507363549	mengajar	2	2013-02-05	1	1	2	2	2	2	\N	\N
fb3d1397-3587-4a35-84ca-538321bda3e2	6b8bf373-de8d-449f-ae3b-1ebc40e65fb8	Tuan MUDAIRIN		1	1	3525110708640001		Gresik	1964-08-07	Jalan Raya Morowudi I RT 2 RW 1 kecamatan Cerme, Kabupaten Gresik	\N	\N	\N	\N	\N	628123141787	Baca, Musik	2	1991-09-07	1	1	\N	\N	1	2	\N	\N
c75e3746-b5ea-4ae2-8002-651e00a84a3a	b202e0ce-5a3a-41ce-beeb-4851b8a99a55	Otaka Arya	Arya	1	1	0		jember	1993-01-26	patrang	\N	\N	\N	\N	\N	628123456	mengajar	2	\N	1	1	2	1	2	2	\N	\N
8f7a90e7-977e-40bf-9d89-601ef9b7e151	55c5ed0e-b44f-4ed4-a5dd-f2a0c4729805	Nirdya Hidayat		2	1	3504016601930004	15379301000647	Tulungagung	1993-01-26	Tulungagung	\N	\N	\N	\N	\N	6282232262757	bermusik, seni rupa, games	1	\N	1	1	2	2	1	1	\N	\N
c70176b5-8dc5-44ec-9d41-a3c8d64b637f	248e0925-3642-4626-8f9d-0c73db7c3833	Syamsul Al Arif		1	1	3511110803710002		Malang	1971-03-08	Jalan Teuku Umar I/25 RT. 36 RW. 08, Bondowoso, Jawa Timur	\N	\N	\N	\N	\N	6285258882884	Traveling	2	\N	1	1	2	2	2	2	\N	\N
ff23a519-fe8f-40ec-a5bd-89dab5cee69e	3cdc656e-15cd-45ee-b8cc-9d00562330ea	Iscandar Salim	Salim	1	1	7371100212670001	\N	Pontianak	1967-12-02	Jalan Raya Sambiroto RT.06 RW.02, Sooko, Mojokerto	15	241	3543	44248	44248	6282191623188	Membaca	2	1965-12-23	1	1	2	2	2	2	\N	1754962450.png
e23f51f4-45b5-4b7b-8a29-f90a18a97a04	7d52346d-ff47-416c-8e7b-8307b6bff857	ALFIYAH, S.Pd.		2	1	0		Nganjuk	1987-04-29	Ds. Watudandang Kec. Prambon Kab. Nganjuk	\N	\N	\N	\N	\N	6285859697977	Membaca	2	2015-09-23	1	1	2	2	2	1	\N	\N
d5b4c41c-39c0-49df-9af5-8cd026cd6af4	d344d8cc-54db-4e73-b94c-94736420f5d0	M. Ali Fauzi		1	1	3524051609900001		Lamongan	1990-09-16	J. Sunan Drajat No 99 Lamongan	\N	\N	\N	\N	\N	6285648073423	TRAVELLING	2	2021-07-08	1	1	2	1	2	2	\N	\N
3af9e334-80c8-4444-9596-5dfb8c59bde0	67559422-7684-4113-a430-4bf060aa7f8f	Nia Rina Miswasari		2	1	3505176804830003		Blitar	1983-04-28	Lingkungan Darungan Rt.01 Rw.04 No. 43 Babadan, Wlingi, Blitar	\N	\N	\N	\N	\N	6281556761455	membaca	2	2009-05-07	1	1	2	2	2	2	\N	\N
054a1058-140f-41b1-aca9-25111b475bf2	30955f68-ff50-414d-b5d0-b6e145aa0686	Hartatik, S.pd		2	1	3524176912820001		Lamongan	1982-12-29	Dusun Sugihrejo Kecamatan Sukodadi Lamongan	\N	\N	\N	\N	\N	6285773373329	mengajar	2	2007-12-08	1	1	2	2	2	2	\N	\N
8e8f5675-2091-408e-9a47-4a4f64050216	4cce191e-7226-4e75-8cdb-ae57fa5d5793	Vina Wahidayanti Mastufa		2	1	3578315806940003		Surabaya	1994-06-18	Kauman Asri 2 no 7 kelurahan Benowo Kecamatan Pakal Surabaya	\N	\N	\N	\N	\N	6282333988994	Bermain	2	2018-08-01	1	1	\N	2	\N	2	\N	\N
1fd7cb6f-cacf-4378-8cfc-b5dc88dafbe9	33ffe9c8-914c-4942-82e2-7d7b479fd28c	IZZATUL MUFIDAH		2	1	3319084210960002		Kudus	1996-10-02	DESA KLUMPIT RT 06 RW 06 KEC.GEBOG KAB.KUDUS, JAWA TENGAH	\N	\N	\N	\N	\N	6281357334386	belajar	2	2019-01-05	1	1	1	2	1	1	\N	\N
5f26d9ca-b78f-46a9-b887-88c5fece85ed	25e30ff1-cac6-4ec8-be88-8e7159d7af34	Dermawati Simatupang		2	2	3277024410740004		Serang	1976-10-04	Jl. Lurah No. 340/Y Cimahi, RT. 002 RW. 017 Kel. Karang Mekar\n Kec. Cimahi Tengah, Kota Cimahi, Jawa Barat	\N	\N	\N	\N	\N	6281382496827	Traveling, Kuliner	2	2007-12-06	1	1	2	2	1	2	\N	\N
f7a14f06-37f1-42d3-b0aa-de332f4898c4	c09eb4b9-d03c-423c-8052-d348f8117083	Abdul Manaf, M. Pd. I		1	1	3513150101770002		Probolinggo	1977-01-01	Jl Pahlawan Ds Gandan RT/RW 003/003, Ds Krejengan, Kec. Krejengan, Kab. Probolinggo	\N	\N	\N	\N	\N	6282324139199	mengajar	2	2004-09-30	1	1	1	1	2	2	\N	\N
3d1a4a0c-f58e-4f88-83c8-b23afbab4630	9905a80d-c6d0-418a-9db6-95393c0d37e9	Pradilla Kenchana		2	1	0		Bukit Raya	1971-03-08	Perum. Arimbi Blok A no 8, Simpang Tiga, Bukit Raya, Pekanbaru Riau	\N	\N	\N	\N	\N	0	mengajar	2	\N	1	1	2	2	1	1	\N	\N
3f952778-ad84-4c37-befa-630ec63f2d4e	2d22e0ab-82d2-4a88-9107-a44377b947fd	Siti Choiriyah	SIti	2	1	3505124606890001	\N	Blitar	1989-06-06	Lingkungan Kedung Bunder RT 002 RW 003 Kel. Kedung Bunder Kec. Sutojayan	15	230	3272	41016	41016	6285853728968	mengajar	2	\N	1	1	2	2	2	2	\N	\N
68adcece-17d4-4d04-8ce4-72bdaba4d016	4439683a-0f96-4b8a-85d2-84c8ca520fd0	Mohammad Imran	Imron	1	1	3509192207970002	\N	jember	1997-07-22	hayam wuruk iv	15	234	3397	42380	42380	62817653	membaca	1	\N	\N	\N	\N	\N	\N	\N	\N	1754556256.jpeg
af203e1e-c836-4ec6-aea5-9c3f2e7423dc	d69a0d2e-5a97-426d-8b7e-03de934a2e6f	Istiani	Isti	2	1	3505075010850008	\N	Blitar	1985-10-10	Dsn. sumberbuntung, kalipucung 01/08 sanankuon, blitar	15	230	3284	41154	41154	62812177901119	mengajar	2	\N	1	1	2	2	1	2	1754375089.png	1754375089.jpg
972a5792-96e8-41e7-ab03-1614e35a580e	35d31909-372a-4648-bca2-49f160948657	Mohammad Imran	imron	1	1	3509192207970002	\N	jember	1997-07-22	hayam wuruk iv	15	234	3369	42153	42153	628761	makan	1	\N	\N	\N	\N	\N	\N	\N	\N	1754458229.jpeg
25d29a14-41fa-43ab-9938-c712cc48eee3	961d4be4-c284-455a-896c-08795e258f6d	AHA Right Brain	-	1	1	1234567891234567	\N	-	2015-01-01	-	15	234	3398	42390	42390	0	-	1	\N	\N	\N	\N	\N	\N	\N	\N	1754624923.png
bee08fd4-b623-4852-bee3-2f479bfbece3	e810c6df-653d-4a0a-81a8-e76a528ba705	Lailatul Murdiana		2	1	3518156504940002	15389404000263	Nganjuk	1994-04-25	Dusun Dawuhan, RT 04 / RW 02, Desa Mancon, Kecamatan Wilangan, Kabupaten Nganjuk	\N	\N	\N	\N	\N	6282257607801	Memasak	2	2019-11-08	1	1	2	2	2	2	\N	\N
95dfad07-4972-4725-8fa8-6fc2f5fa4749	9b911143-c890-4503-a78d-ac71dddad06b	MUHAMAD DAMANHURI		1	1	3506622204730000		Kediri	1973-04-22	Jl. Gajah Mada 303 Dsn. Sawahan Ds. Purwokerto RT 02/RW 02 Kec. Ngadiluwih Kab. Kediri JATIM	\N	\N	\N	\N	\N	6281259737301	membaca	2	1998-09-06	1	1	2	2	2	2	\N	\N
edeae956-c201-41a6-a3a3-0d111e3c019b	02f6505c-b430-4cbb-9e7c-874ef0fd2201	Arinda Senja Riani		2	1	3504014609910001	15379011000404	TULUNGAGUNG	1991-09-06	JL. MT HARYONO V/14C	\N	\N	\N	\N	\N	6285735123422	BERKEBUN	2	2020-07-10	1	1	1	2	1	2	\N	\N
f1cbdd8f-5eee-472d-bf82-7901ad5be5e6	8cf3617b-2471-4426-afd8-c182bae32a30	Miftahul Khoiriyah		2	1	3505124602870002	15368702000272	Blitar	1987-06-02	Desa Sumberingin Kidul, Kec. Ngunut, Kabupaten Tulungagung, Jawa Timur 66292	\N	\N	\N	\N	\N	6285749121579	Membaca	2	2012-05-04	1	1	2	2	2	2	\N	\N
a86c38fa-9f78-4cde-9c66-b98e86ccdafd	ea748e39-7288-4dd4-a183-d2e4147c20af	MOHAMMAD ALI FAUZI		1	1	3524051609900001		LAMONGAN	1990-09-16	Jl.masjid Rt.02 Rw.03 Karangkembang Babat-Lamongan.	\N	\N	\N	\N	\N	6285648073423	TRAVELLING	2	2021-07-08	1	1	2	1	2	2	\N	\N
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at, last_login_at) FROM stdin;
5270654c-0753-4d47-92ff-8e138d35e904	Albiano Hanif Abqary	albiano-hanif-abqary@example.com	\N	$2y$12$uT7vVyA5tfvMx1STwJa6RuG.58fKBc.PloVGEQ939jor7PB/NHyuu	\N	2025-07-25 08:29:40	2025-07-25 08:29:40	\N
43c3a175-a5f8-4a36-9665-27227ee02ea2	Muchammad Wafi Fadlurrahman	muchammad-wafi-fadlurrahman@example.com	\N	$2y$12$7NzhExDI8vVhZiQOB.L4x.1a0VwoTfI14fJfd7KLdb4q6DvOaTc7a	\N	2025-07-25 08:29:40	2025-07-25 08:29:40	\N
ba791bbb-91f0-45be-bd18-dea3e755fdb2	Kevin Aditya dirga	kevin-aditya-dirga@example.com	\N	$2y$12$XdgNS6QwkLptpNn.cl5Mme3.N3mdn5H.L/tzD9Gj2DuUZ74kcRJLu	\N	2025-07-25 08:29:40	2025-07-25 08:29:40	\N
e17410ee-285b-4949-bf2e-41c5537ec1f1	Muhammad Salman Dzulkarnain	muhammad-salman-dzulkarnain@example.com	\N	$2y$12$Q/7vbwbKBl6p0OV93c4gvOHWk4xNSGtQEv1N8idgnAGVCL3DsMye2	\N	2025-07-25 08:29:41	2025-07-25 08:29:41	\N
389dad9f-a531-42f0-9cfd-89901a9eec4d	Aisyah Kasyafani Arsyla	aisyah-kasyafani-arsyla@example.com	\N	$2y$12$Wbe0E76T1EGzyQxrqaRr3eNo30TUknGZsKmK4hGTb9KYdDR2o2CA.	\N	2025-07-25 08:29:41	2025-07-25 08:29:41	\N
fa4cfcfc-3188-48da-aeec-cc3f2dd25b98	Kafa Nasrullah Ahmad	kafa-nasrullah-ahmad@example.com	\N	$2y$12$eg4tQI9od5t3kmb.P7MlhO75aj1TkKLVZ6bp8sNUD6hP3xQ2EkT/6	\N	2025-07-25 08:29:41	2025-07-25 08:29:41	\N
64a91190-83a6-4902-8764-64aec96b62db	Uwais Mustafa Anwar	uwais-mustafa-anwar@example.com	\N	$2y$12$y1o8xlzdpWEssrwIJmPEGOBZOm3vvTCJuE0bLMsjksqRU3lHa5iaq	\N	2025-07-25 08:29:41	2025-07-25 08:29:41	\N
be2940b3-dc0b-4e63-b18c-51176c176400	Azka Mandala putra	azka-mandala-putra@example.com	\N	$2y$12$W2xcvWNxVMIe0ib8RvM.huqtgq8wx4kxeKVgBK55PGBIi9iJhEDta	\N	2025-07-25 08:29:41	2025-07-25 08:29:41	\N
5dd20902-c91e-4aaa-a35a-7f29d2f8130c	Farel Arsya Wijaya	farel-arsya-wijaya@example.com	\N	$2y$12$HCkC.pPtqNowyskB9C.9guL5bkAJE4SxxGaFvfaC8.E8lCJEL06/m	\N	2025-07-25 08:29:42	2025-07-25 08:29:42	\N
23088d79-33dc-4b08-8503-527a515fe62c	Azzah Haniyah Az Zahra	siti79303@gmail.com	\N	$2y$12$u4ZwQRAGeICH4waEMxosKOGpmd.e0rNaQv8Fdp7irStxtsyxBBJb.	\N	2025-07-25 08:29:42	2025-07-25 08:29:42	\N
b1f99161-35f6-4652-ab84-79ffb63c3f1c	Kaysa Khoirun Najwaa	kaysa-khoirun-najwaa@example.com	\N	$2y$12$Rmz3NDSWVsHTJgkJ24iszemM8LhFX5.4Ez/Q5QVtsYsEitu08nmE.	\N	2025-07-25 08:29:42	2025-07-25 08:29:42	\N
35eb1c83-a965-4aeb-b091-ade317cad8cf	Tombak Souma Maliki	widasouma@gmail.com	\N	$2y$12$va6LcGX07YdFgBC1SScMZOC.8a03OergTEpY6QW9LaUXP890TD.gO	\N	2025-07-25 08:29:42	2025-07-25 08:29:42	\N
9eab1ef2-306a-4e2e-977e-88075571cebb	Tiffany Almayra Maharanny	tiffany-almayra-maharanny@example.com	\N	$2y$12$jS40ohQabmC7uEygSsnGjOxzuOuxSJDyueJEHhT96YDoulwFNGGXq	\N	2025-07-25 08:29:43	2025-07-25 08:29:43	\N
ca46019e-3811-4225-bacf-e830e6fc9769	Amrina Dwi Mulya Rosadha	amrina-dwi-mulya-rosadha@example.com	\N	$2y$12$bdCkzfBDlruzO4lC3gx3ye2RumBfWt1CtEsQpuOTduhFZ4Hi7LETC	\N	2025-07-25 08:29:43	2025-07-25 08:29:43	\N
c4f05d57-2b10-4409-8f1e-649c907b0666	Alkhalifi Bayu Trisna Hakim	fitrihayatulhusna79@gmail.com	\N	$2y$12$gGIvaXwTGBHm8K1AwUBMXeIX21QCXqXJ3kpSKuu/0Rg9CFoPFuy8q	\N	2025-07-25 08:29:43	2025-07-25 08:29:43	\N
11fc299f-9cfe-4deb-92a5-b5c5eced0e1b	Zhafira Listya Mahardinata	zhafira-listya-mahardinata@example.com	\N	$2y$12$psLpfhx2UNXbFrFw6QvlTe6UoXsCD57IOEmVESN..0u/9VRMrejwG	\N	2025-07-25 08:29:43	2025-07-25 08:29:43	\N
b202e0ce-5a3a-41ce-beeb-4851b8a99a55	Otaka Arya	Otaka Arya	\N	$2y$12$LRjo.r7Ep/DbQOcurcwqZ.hsmJZQwtfywVLC1wYLGK/RQ6isHy/a.	\N	2025-07-23 06:24:30	2025-07-23 06:24:30	\N
55c5ed0e-b44f-4ed4-a5dd-f2a0c4729805	Nirdya Hidayat	Nirdya Hidayat	\N	$2y$12$zIUsRnJ8Z5d/I7CkbQLub.Je5WvyWt/KMLMY9HAPffByEJGxFwWm2	\N	2025-07-23 06:24:30	2025-07-23 06:24:30	\N
248e0925-3642-4626-8f9d-0c73db7c3833	Syamsul Al Arif	Syamsul Al Arif	\N	$2y$12$fjmx0fjbU6Q8LMeuFQYcR.74OQFyiEN0HHAYQxdBVBa0ITOKFA.CG	\N	2025-07-23 06:24:31	2025-07-23 06:24:31	\N
2d4f6b18-d157-44ef-8135-8f96880e21d2	Vina wahidayanti mastufa	Vina wahidayanti mastufa	\N	$2y$12$uV16BnRxY2K1YULp95olTu.TtqrGbsPiRrdvvt/ywMIdx6yK0lAsm	\N	2025-07-23 06:24:31	2025-07-23 06:24:31	\N
7d52346d-ff47-416c-8e7b-8307b6bff857	ALFIYAH, S.Pd.	ALFIYAH, S.Pd.	\N	$2y$12$hEhf6fA2HEBfGP5YwyTSCODDzV2lcsO7JH7YQH7LBTc4DrhSpbiIu	\N	2025-07-23 06:24:33	2025-07-23 06:24:33	\N
d69a0d2e-5a97-426d-8b7e-03de934a2e6f	Istiani	istiani@gmail.com	\N	$2y$12$k5fEqP/p6dRXMkoM9QU7Q./3sDDTWVUoxXYXQ3i5nSApAOOMiQt46	\N	2025-07-23 06:24:37	2025-08-05 06:24:49	\N
2d22e0ab-82d2-4a88-9107-a44377b947fd	Siti Choiriyah	sitichoiriyah@gmail.com	\N	$2y$12$9NhxAWUk1MGR09r6R8Un/eJaIt5vQnuqbGxB.5JQQC0psZh/WEnr.	\N	2025-07-23 06:24:35	2025-08-09 04:19:03	\N
e810c6df-653d-4a0a-81a8-e76a528ba705	Lailatul Murdiana	Lailatul Murdiana	\N	$2y$12$BcGZ8OPqgKFFG0VJSnUfO.cUL02GoPMaX5f/1B9wX16hYxI6S7u7S	\N	2025-07-23 06:24:31	2025-07-23 06:24:31	\N
9b911143-c890-4503-a78d-ac71dddad06b	MUHAMAD DAMANHURI	MUHAMAD DAMANHURI	\N	$2y$12$0mNCwafji/QjZ2SZuLhg5ufLhbA3CRREpVBoMUcTERvsdgOoK6UPi	\N	2025-07-23 06:24:31	2025-07-23 06:24:31	\N
02f6505c-b430-4cbb-9e7c-874ef0fd2201	Arinda Senja Riani	Arinda Senja Riani	\N	$2y$12$vXXzrt5RBVi//Jjamq.l3OJhaNtAGpgc5BvLZbNKRXYaiQJHIrEZW	\N	2025-07-23 06:24:31	2025-07-23 06:24:31	\N
b88c39f1-d6c2-4597-93a1-5dfe7ed6e52f	Miftahur rohmah	Miftahur rohmah	\N	$2y$12$nlq/rtuvOb.GcR5ZKhBJ3uYJtvgp/loFnFJqxVVbeiJYwRTLvSQyO	\N	2025-07-23 06:24:32	2025-07-23 06:24:32	\N
b7b4990a-f9d9-4a31-bd95-263305ce5f24	Ririn Purwaningsih	Ririn Purwaningsih	\N	$2y$12$hTM5iOnyr25OyusgjBQzge2bfzBncwj7Au4XV2T4FHMiNgLGL99T6	\N	2025-07-23 06:24:32	2025-07-23 06:24:32	\N
ae1ef2ef-cece-436a-a04e-ce55c0c9b9a3	Mochamad Sholehudin	Mochamad Sholehudin	\N	$2y$12$36VAVyTEkTANJwcBwIYOvuD98MiGQl5PK.gS99aF6AZ6.4IptPEDW	\N	2025-07-23 06:24:33	2025-07-23 06:24:33	\N
c09eb4b9-d03c-423c-8052-d348f8117083	Abdul Manaf, M. Pd. I	Abdul Manaf, M. Pd. I	\N	$2y$12$PT4ps3aUETixVL5wUtnAE.dmvWYGb9c827sRXYV8vimQCY95xrxFa	\N	2025-07-23 06:24:33	2025-07-23 06:24:33	\N
8cf3617b-2471-4426-afd8-c182bae32a30	Miftahul Khoiriyah	Miftahul Khoiriyah	\N	$2y$12$/zubbIQ4dkYGCEq6ql5Pfu16UBfv9IJPigRwnDT7dtyT5ygHXTm66	\N	2025-07-23 06:24:33	2025-07-23 06:24:33	\N
ea748e39-7288-4dd4-a183-d2e4147c20af	MOHAMMAD ALI FAUZI	MOHAMMAD ALI FAUZI	\N	$2y$12$1WUdNfXpMWGtplyAqLmKA.ndli9K6yLz/gfrlbg0okDcCG5lQk2xy	\N	2025-07-23 06:24:34	2025-07-23 06:24:34	\N
9fedfb47-b691-439a-88db-1ac85ecf66c8	Akhmad Syaifudin	Akhmad Syaifudin	\N	$2y$12$hmN3qEdY5rYtFMrCYoJLA.AW3Afqgs.To2NNuBTxXN0F1ucCMoTpW	\N	2025-07-23 06:24:34	2025-07-23 06:24:34	\N
d344d8cc-54db-4e73-b94c-94736420f5d0	M. Ali Fauzi	M. Ali Fauzi	\N	$2y$12$o5TutEFmxTfjeKuM7CgphusInMzWTEKIWjvUPSeIIP/nhkgmPVDyO	\N	2025-07-23 06:24:34	2025-07-23 06:24:34	\N
e025ad70-da84-4dc4-895a-d933c529550a	Dwi Masita Widyaningsih	Dwi Masita Widyaningsih	\N	$2y$12$ie6ef3RkI/8SykdeQIPf9u9/FszfurSwHW33LzvItYo9dTG6zUgWO	\N	2025-07-23 06:24:34	2025-07-23 06:24:34	\N
67559422-7684-4113-a430-4bf060aa7f8f	Nia Rina Miswasari	Nia Rina Miswasari	\N	$2y$12$mS/XmVX9EMW8gJI9HP66KeqZyMbLo0ZMjoV4.9qm.sO7f6nS0IFSC	\N	2025-07-23 06:24:35	2025-07-23 06:24:35	\N
9905a80d-c6d0-418a-9db6-95393c0d37e9	Pradilla Kenchana	Pradilla Kenchana	\N	$2y$12$03LEmOmwVs3ifkc2XThZKu/7eZTRX0tP94eVI4jN5/nbzms6CX/tC	\N	2025-07-23 06:24:35	2025-07-23 06:24:35	\N
30955f68-ff50-414d-b5d0-b6e145aa0686	Hartatik, S.pd	Hartatik, S.pd	\N	$2y$12$O0pgCFAKMJVoGoTjQCv8q.YBlGytIVlWD35CQhpiBH.SW6648YCea	\N	2025-07-23 06:24:35	2025-07-23 06:24:35	\N
4cce191e-7226-4e75-8cdb-ae57fa5d5793	Vina Wahidayanti Mastufa	Vina Wahidayanti Mastufa	\N	$2y$12$jrTo06igkIDaqjdpVAp9VOdEaomJkJLbZB1wWajnLbZIUjYWrBCSC	\N	2025-07-23 06:24:36	2025-07-23 06:24:36	\N
6b8bf373-de8d-449f-ae3b-1ebc40e65fb8	Tuan MUDAIRIN	Tuan MUDAIRIN	\N	$2y$12$A6DxNKEtCpc8ALrDITpXBOM5kUEN9ht8Gb6u3r9urSozwVUJdXdbW	\N	2025-07-23 06:24:36	2025-07-23 06:24:36	\N
33ffe9c8-914c-4942-82e2-7d7b479fd28c	IZZATUL MUFIDAH	IZZATUL MUFIDAH	\N	$2y$12$kNAcNmgK./.vBLMhAdLw9OQEVBZQTqio/9of3aWn5XZHaSeWhBYd6	\N	2025-07-23 06:24:36	2025-07-23 06:24:36	\N
25e30ff1-cac6-4ec8-be88-8e7159d7af34	Dermawati Simatupang	Dermawati Simatupang	\N	$2y$12$91DoPr6t6lU4spUhw/SHp.pAhj6Ox3dejGufGFOlVYto1L4tKtUYy	\N	2025-07-23 06:24:36	2025-07-23 06:24:36	\N
75b1a962-938b-4870-8541-57338b35876d	Alfiyah, S.pd.	alfiyah-spd@example.com	\N	$2y$12$yPtda4nR6AQ3cM7hU0KPg.fplAIRybr4YHmqg.b.dNsIGgvpOtsbS	\N	2025-07-24 07:38:59	2025-08-09 01:40:34	\N
b1ebd531-d661-4b52-bf49-f06dce0686fc	Tabina Ghaizka I.P	tabina-ghaizka-ip@example.com	\N	$2y$12$ckoHOG1I2ze7JZ1PFqSmp.eg49ojyQ85Vs1X4x5HUaVMSMUWEQlvG	\N	2025-07-25 08:29:44	2025-07-25 08:29:44	\N
aa15db27-25dc-4c0c-ba97-fa2ee8609173	Andhara Kirana Mahestri	andhara-kirana-mahestri@example.com	\N	$2y$12$8JtZY508B/qE1pQDGDHkEOBKkCA/EaYYdUJGuqqG6Xw1.7iLkInDS	\N	2025-07-25 08:29:44	2025-07-25 08:29:44	\N
29e84457-9da8-461d-930c-7f131e710d54	Shakeela Chaira Sakhi Prasetya	shakeela-chaira-sakhi-prasetya@example.com	\N	$2y$12$byHnDWa/lPHkPvNpTjbO4O5Zjl/zEb5FOgB4YJ9ExSC5d1fZO92Aq	\N	2025-07-25 08:29:44	2025-07-25 08:29:44	\N
922047da-e144-4640-943f-b6ac91d2236a	Nabila Desti Maulidia	nabila-desti-maulidia@example.com	\N	$2y$12$YHCZnxSB1QnkYqydlbDBhuucKydkm2UR9F6nUQi6fSI0/9BbNDmcK	\N	2025-07-25 08:29:44	2025-07-25 08:29:44	\N
6112cf16-f3cf-4e04-adb6-bd4ceebec003	Mikail Thaqif Faeyza	mikail-thaqif-faeyza@example.com	\N	$2y$12$cCQQwqpkq2cZo6.6Ii.ig.5aLHmykEtCHN9YyiJm7ctQ/8LFz4Oby	\N	2025-07-25 08:29:44	2025-07-25 08:29:44	\N
4523711e-89aa-4d69-b6e6-d8da401cafc6	Nadhifa Azzalfa Zhahira P.	nadhifa-azzalfa-zhahira-p@example.com	\N	$2y$12$JdjFokn/3CuimviauihB2escXpBobvlBV8cqVWRIMzmseV8roCWf2	\N	2025-07-25 08:29:45	2025-07-25 08:29:45	\N
6bb5ba8f-720d-4cd4-adb3-185e34334cf5	Mochamad Sholehudin	mochamad-sholehudin@example.com	\N	$2y$12$OsdD6U.mVQi.gyaDT4F48OpFJaEyemiXXbndnCdR60SzbEEq3mFou	\N	2025-07-24 07:38:59	2025-08-09 01:41:36	\N
270ebcc1-19b4-4b52-a61c-f20abf943bb2	Tri Atarini	atarinitri@gmail.com	\N	$2y$12$4lg0T/B/nvZZDrltSi3q5OTXeRqJLGyhLtUGyd3lbORuw.2UqaaVm	\N	2025-07-24 07:38:53	2025-07-24 07:38:53	\N
ae2deadf-2f6a-4214-8ea1-51014b03f540	Lailatul Murdiana	lailatulmurdiana7380@gmail.com	\N	$2y$12$QZ5ue2hGWzJ/6/rflwt3eOxLOhkr5JW8cbPfcokg2xryVIxnHb5.K	\N	2025-07-24 07:38:53	2025-07-24 07:38:53	\N
d4f71b70-ef39-47ce-83e3-18505f0c57fd	Siti Ummahatul Fitriyah	siti-ummahatul-fitriyah@example.com	\N	$2y$12$pC.BjGmP66enPe2uZ.aDPe8idF/giZ81ymkQ6DNmVA3bHn5L5U6eO	\N	2025-07-24 07:38:53	2025-07-24 07:38:53	\N
6a7f85a2-b208-487d-8754-ac502bf54b43	Ria Yuli Wahyu Wilujeng	ria-yuli-wahyu-wilujeng@example.com	\N	$2y$12$giBVjNyoo0Fh47nNivo.Z.kaWhN1OpoVYNYzv/c.QR3b1t8w.PVCW	\N	2025-07-24 07:38:54	2025-07-24 07:38:54	\N
525149cf-73ba-4372-9dbd-bd61518a6fdd	Putri Ibah Apriliani	putri-ibah-apriliani@example.com	\N	$2y$12$1xl3K20E89PcJgVnaknmKOB/VHSRVV2Va.Cwp3DvU.EBoC3QKsCEG	\N	2025-07-24 07:38:54	2025-07-24 07:38:54	\N
586b9e48-2ac9-4021-9ea9-784bdce9d284	Ika	ika@example.com	\N	$2y$12$6pVnu9ro7qxx313j4ONzEeU8Z1ITSzehApH.KNaQgpJ0l.qtlg2k2	\N	2025-07-24 07:38:54	2025-07-24 07:38:54	\N
87347db9-2dc3-452e-8f65-332ae2276d0a	Arinda Senja Riani	arinda-senja-riani@example.com	\N	$2y$12$/wNehYhelE9leZ/2ddfvV.A3udqLEaCQ00axDpPZap70fh2TzoWRi	\N	2025-07-24 07:38:54	2025-07-24 07:38:54	\N
248a9f17-bd6c-426e-92d4-a34bf222a694	Rini Widya Lestari	riniwidya241@gmail.com	\N	$2y$12$ZM3I8rRpcPYwk1uJmv5zbuuNIt7lHAKCuWT84D7j.btAhQBHcX4cu	\N	2025-07-24 07:38:54	2025-07-24 07:38:54	\N
86ab2a26-602b-49be-bf26-0a20af0c09a7	Durotun Nasiin	durotunasiin@gmail.com	\N	$2y$12$gLKIKnTxbKRUtZ7EpRDsjetCvnY1a3cT/nL7zi6q7Z9z9XDWNyIs2	\N	2025-07-24 07:38:55	2025-07-24 07:38:55	\N
c0668550-76e7-4afd-80a0-163e32fb20b8	Ristiana	Ristiana905@gmail.com	\N	$2y$12$7rurqf/4D5gFikTnMtlI4O4FinzxN98WnIIxL0ookUbMZIewuKaQC	\N	2025-07-24 07:38:55	2025-07-24 07:38:55	\N
06925901-2dd5-4fce-90f4-5628eac97cd7	Yusrina Dzakiroh	yusrinadzakiroh@gmail.com	\N	$2y$12$Jcsrlc8FheQm48L3HYYer.tAlEZx2pxZCn9IBSvClUYwXeRDLrpcu	\N	2025-07-24 07:38:55	2025-07-24 07:38:55	\N
bca0272f-65cf-4005-8ed9-88a21caf6c67	Melinia Sintia Ningtyas	meliniasintia@gmail.com	\N	$2y$12$481rKIdD3wNdfOzqipQzXeKvPnyZEBBSZ0uHesZgOLwCXTTQdJaRS	\N	2025-07-24 07:38:55	2025-07-24 07:38:55	\N
24b82a3b-015f-4f7f-807c-4ea86e1a33c3	Triana May Latul Anisa	tmaylatulanisa@gmail.com	\N	$2y$12$57nw6sEiJXh0oUtU6NxvuOLP48oL73dtFrjpKjgxSlVqykCmMu3Ny	\N	2025-07-24 07:38:56	2025-07-24 07:38:56	\N
65688cce-bb9e-4580-b946-ed4ca6f9d8f2	Fera Dwi Safitri	ferasafitri252@gmail.com	\N	$2y$12$2DkRpVdF.iJX9LtHQiBcvO3fZUEBxDTcSqobjyYM0o8l3j/2bHVSu	\N	2025-07-24 07:38:56	2025-07-24 07:38:56	\N
8c65c378-ecce-4162-ae77-826b87b5b6e3	Novita Dewi Rahmawati	novitadewir01@gmail.com	\N	$2y$12$trT1Tguyx3ThQO990DHChePCWRz0dVsRxeL.YArUXVKTOaEN7NfGC	\N	2025-07-24 07:38:56	2025-07-24 07:38:56	\N
7b956aa4-77d8-4259-9c67-6ad09de3db38	Amrika Ely Windayani	amrika-ely-windayani@example.com	\N	$2y$12$.96bu8TWonNeYFsDiDBeiumhEQLKaCtfC0IUTFJ15ir7z478yJ7d2	\N	2025-07-24 07:38:56	2025-07-24 07:38:56	\N
14c18502-5a8c-44bd-9061-a0c5398be587	Rindang Arumsari	rindang-arumsari@example.com	\N	$2y$12$5KDmTgwXLNYd4QZkyzHJ.u31dXORjjww7fkCY8i3zE13mpH9lKLQa	\N	2025-07-24 07:38:57	2025-07-24 07:38:57	\N
a9dc3fcf-e8cc-480e-b0e7-a4fe4e721f36	Bidayatul Hasanah	bidayatulhasanah37@gmail.com	\N	$2y$12$RkMNsIrmZCZIXwagQgUVieVCAKbtKObIfohZPLBMH3SeWrbvkh5H2	\N	2025-07-24 07:38:57	2025-07-24 07:38:57	\N
ce377435-235e-4e0e-9275-33f9d8eddb2f	Nurul Khabibah	nurul-khabibah@example.com	\N	$2y$12$yf.b/DY1x.Of4sIEj8P94ec7uehTbVPGqXQKx1TX2leqNz3oK5iqG	\N	2025-07-24 07:38:57	2025-07-24 07:38:57	\N
d6b1ce47-63f3-468f-9a64-7a3d4422049b	Nita Hidayatul Karfiza	karfizanita@gmail.com	\N	$2y$12$dJXIAxztbNZcqprwZ.1DLeBD5LTrZP43V9BCdOAVf2YZjLMfksr8.	\N	2025-07-24 07:38:57	2025-07-24 07:38:57	\N
eb35f077-b854-4e1b-878c-4bd39267ce39	Eva Fitria	evafitri180@gmail.com	\N	$2y$12$A9XuG6uKJb3x40sTSVFMzuWqJEScfVRSfqO.tKyQx99gdlbl9fRAa	\N	2025-07-24 07:38:57	2025-07-24 07:38:57	\N
cb878da7-ecb6-41f9-99e3-6bfeab9e6d53	Umi Kiptida'iyah	kiptidaiyah@gmail.com	\N	$2y$12$KjpEOBfDpHPBnThKj/REwuA18gr.kqeFnutwGj1bEHYCx.pQT/17K	\N	2025-07-24 07:38:58	2025-07-24 07:38:58	\N
17729f28-5451-4619-af31-e4192f819e64	Agustina Eka Saputri	agustinaekaa228@gmail.com	\N	$2y$12$acIDYvBsRNskEWYIozMJE.kHgWlH7V9rJa.PUNWz.0ZnzNt8r1w2O	\N	2025-07-24 07:38:58	2025-07-24 07:38:58	\N
ea0c3152-5e9d-4eac-9a23-8aab14762aa9	Miftahul Khoiriyah	miftahul-khoiriyah@example.com	\N	$2y$12$ky8InuPh4jyHeCHi99UXKurcIlRQpPyQ80Iaslad5xyo0SllQwYFm	\N	2025-07-24 07:38:58	2025-07-24 07:38:58	\N
b924d2d8-ad9d-43e6-82f3-36d2877577e2	Trisna Choiriyah	trisna-choiriyah@example.com	\N	$2y$12$4RO2fNoAGCcR17YiLTEig.DwNmc6aPU2qkydXp655wD7jUB5VCBla	\N	2025-07-24 07:38:58	2025-07-24 07:38:58	\N
bcdbd76b-f140-4250-b229-cb623923ec6c	Maslukhatul Widat	maslukhatul-widat@example.com	\N	$2y$12$9UZxgNwp/VsLAiQyWzc7DeUIdd6oqXBhuoiFXtBhbgbmmooQXyQye	\N	2025-07-24 07:38:59	2025-07-24 07:38:59	\N
3402dd5a-661f-4b50-a8e4-352c8caf30e4	Ratna Utari Dewi	ratna-utari-dewi@example.com	\N	$2y$12$P0mWjL616WIH2GCIrkS6K.R3QcNwyPMMIv60n9f7LHKech4JC.UU2	\N	2025-07-24 07:38:59	2025-07-24 07:38:59	\N
ff0a8813-7647-449f-9e4d-f2a40025f3d8	Beddy Luqman Hakim	beddy-luqman-hakim@example.com	\N	$2y$12$d4iOM7lY8yom5gRDxfE3kuKvd4jXmjyoYQqrDHrXl8KxCNILAPESe	\N	2025-07-24 07:38:59	2025-07-24 07:38:59	\N
9166c631-93b4-47f3-8a50-4ff812fd97af	JULIA TANTI RISTIANDA	julia-tanti-ristianda@example.com	\N	$2y$12$O7VWccOMidPoL1h1xj5ddePPQQWxnnsL2I8yKdBsHSzbftUeoOVOy	\N	2025-07-24 07:39:00	2025-07-24 07:39:00	\N
db4e8b48-3594-4614-83a7-33666e277544	Inin Saroh	inin-saroh@example.com	\N	$2y$12$7sjUkpI71c0fWp493idGEevaqxS.Jnd55mhmGxm4HBPBf30.fJ0BS	\N	2025-07-24 07:39:00	2025-07-24 07:39:00	\N
9f82bb4a-0c6a-4f5c-9735-844d242aeede	Kurnia Agustina Devanti	kurnia-agustina-devanti@example.com	\N	$2y$12$fw1LVDYNsEEt4Rc/tgCVruCBozHaIS5mCSKnehj30aLFJ4VgmjKK.	\N	2025-07-24 07:39:00	2025-07-24 07:39:00	\N
cb5bee6d-a33d-4fd4-9418-42ecd4662709	LILLA WAHYU SEPRIYAN PUTRI	lilla-wahyu-sepriyan-putri@example.com	\N	$2y$12$esOiGN/uszxB1Qbex5yhf.QXmsOadPaPObXsKw4V8DXPn1MADErli	\N	2025-07-24 07:39:00	2025-07-24 07:39:00	\N
4f23cd15-466f-47b1-88d1-1a7496109889	Aprilia Dewi Elvitasari	aprilia-dewi-elvitasari@example.com	\N	$2y$12$iyObrsGOOz/JQMauoRhHhuh.25SFIgUT7c8upvfj9Po/Nggu/bR2i	\N	2025-07-24 07:39:01	2025-07-24 07:39:01	\N
e674522e-f9c4-410c-aa13-b84d440ad092	Afina Ulin Nuha	afina-ulin-nuha@example.com	\N	$2y$12$oO9FcvSSP5GGqAppd2Uihu1.cz.bySZOwyQbloHaxRrGw00FuSI5a	\N	2025-07-24 07:39:01	2025-07-24 07:39:01	\N
17cf9c76-034d-4c86-be22-517658b4160d	Pratiwi	pratiwi@example.com	\N	$2y$12$4hj8Ca5Iw8VzhhAeSuLtZ.SOWCnA/Bhp3B6qjg5O46D8vTJzIy5qS	\N	2025-07-24 07:39:01	2025-07-24 07:39:01	\N
7ce69499-6188-4141-a003-1a81df159ff9		@example.com	\N	$2y$12$q1F2NnvRPAEkH4uW989qkexhWSZoeTkzAdBhz2N8Im3EhyQMth4nK	\N	2025-07-24 07:39:01	2025-07-24 07:39:01	\N
5f189ecc-fc6f-4e00-bdc8-89d08ddd13a0	Muhammad Azzam Pradipta	muhammad-azzam-pradipta@example.com	\N	$2y$12$uSBqmNZDyqRl8s3HC7Kbu.6csf9JrXh.yuINQU9UzZ6NeSrWcHcFm	\N	2025-07-25 08:29:45	2025-07-25 08:29:45	\N
78d64da5-5184-4637-abe2-f73a3c2a201e	Keysa Nuraini Azzahra	keysa-nuraini-azzahra@example.com	\N	$2y$12$myzr6k5U3u9MtQibAuuT.uW4YZv7hDqWTQOykRCJwquRhqqNVoWu6	\N	2025-07-25 08:29:45	2025-07-25 08:29:45	\N
64a78686-a5f8-47c2-bda1-529904f4c738	Chelsea Aulia Kimoura	chelsea-aulia-kimoura@example.com	\N	$2y$12$oOxEB7LH5El0hg2t/6XsE.hy2aZjFEzlpxAa/5zke1KuEfLcCl3/W	\N	2025-07-25 08:29:45	2025-07-25 08:29:45	\N
e6aa23ee-cd83-43db-acb4-5f8f8c303a6f	Rahma Susanti	rahma-susanti@example.com	\N	$2y$12$jGoblUJAyv8bBWkpnux.4.sC1EG4thVXKUtknHbcFSTv5/LOY6cH.	\N	2025-07-25 08:29:46	2025-07-25 08:29:46	\N
fabde6be-7151-4316-a16a-693194026882	Halwa Zahsyan Jasmin	halwa-zahsyan-jasmin@example.com	\N	$2y$12$MMZP7hMNlmM.Y/a230BrzOgkd3HWM1LK30S4HmHLM5I3BjGAAQK4e	\N	2025-07-25 08:29:46	2025-07-25 08:29:46	\N
f8ead133-a58c-4ebb-9e78-da29237776d9	Zidna Ilma	zidna-ilma@example.com	\N	$2y$12$c.834XGHRu3iegEvLps5qeUwwivLAnjSMAsuTv4TPaiC1vdpzBWua	\N	2025-07-25 08:29:46	2025-07-25 08:29:46	\N
accfafd0-7d8b-4703-9381-45b5b6d7e47b	Bailia Zafira Hari S.	bailia-zafira-hari-s@example.com	\N	$2y$12$FgzolmyUty55k/dst2JRDem3QhwNkdhI.JSW/S1yBwSGUn8Uyb/V6	\N	2025-07-25 08:29:46	2025-07-25 08:29:46	\N
fdbdacf3-d588-4156-b124-ec52645da133	Sabrina Salsabila	sabrina-salsabila@example.com	\N	$2y$12$lZd0Bhedtpgj.iS3n5cWTe9DzVT.fiYNyiVoGgX9KO8D0CJhkWPeC	\N	2025-07-25 08:29:46	2025-07-25 08:29:46	\N
980c8217-0b11-4b5f-bd46-080f879cd127	Revanya Alesha Muthia R.	revanya-alesha-muthia-r@example.com	\N	$2y$12$6vF69q2.4Qya4ss2y/T3a.1pC1EJJHVQCmY0YIcxegp/xKg9eBE1.	\N	2025-07-25 08:29:47	2025-07-25 08:29:47	\N
36fa39b9-27cf-4f67-86b1-99be4b3d5529	Siti Assyifa Azzalia	siti-assyifa-azzalia@example.com	\N	$2y$12$B64yxO1irYgNPdx5fKyCBOgSoNnZqSY0pOS.NpJXI33PfWTd59ED.	\N	2025-07-25 08:29:47	2025-07-25 08:29:47	\N
8b0776a9-4d08-477b-936a-36dcc04410be	Efraim Gabrian Kurnia	efraim-gabrian-kurnia@example.com	\N	$2y$12$MXBjG.rrd4rKoz53Je56g.ttyqJsZZXrnZMzpSu1nMcPO3bDUJ9Xq	\N	2025-07-25 08:29:47	2025-07-25 08:29:47	\N
1941124a-2394-4775-8d87-5e0f83064ea2	Citra Shafina Barnadi Putri	citra-shafina-barnadi-putri@example.com	\N	$2y$12$vEPOmweSRkvrxx7.dltjp.BaPUPoCgbqEdUEAaeohwhWrWBOBFR2O	\N	2025-07-25 08:29:47	2025-07-25 08:29:47	\N
bcbc4b62-d208-4338-a653-3773f3e4fbc2	Dzaky Almair Nabil	dzaky-almair-nabil@example.com	\N	$2y$12$bDqWPt.MZOIhSgnfOpNNb.P97yiOrL0lZ4FZ31x3At3heHxs/qLgS	\N	2025-07-25 08:29:48	2025-07-25 08:29:48	\N
1ad3b020-9e2d-473b-a2f2-19914669b425	Rakajaya Dirgantara	rakajaya-dirgantara@example.com	\N	$2y$12$aHbuKDXyYH5GTMuksu.Q9.0quij5HoFiTgdcE3I5b3QnfihmlZTiS	\N	2025-07-25 08:29:48	2025-07-25 08:29:48	\N
c1feca83-c363-43d2-855a-a3fbde365ce3	Ahmad Fathan Arrahman	ahmad-fathan-arrahman@example.com	\N	$2y$12$ryzVa3gTDCmpB6Q50/InzuJC0TA6UB/E1uKqkDBNYzX3jvQ0uQc9a	\N	2025-07-25 08:29:48	2025-07-25 08:29:48	\N
64613d23-1266-478b-806c-9e9ea6904234	Arsakha Ghazanfar Prasetya	arsakha-ghazanfar-prasetya@example.com	\N	$2y$12$vqTqRcprBxJIP.QM.PooW.ZXd5oXN9SpP3OswdsxP.C0VJQz99tNS	\N	2025-07-25 08:29:48	2025-07-25 08:29:48	\N
894ec29a-9117-4c07-b508-eca476a8133c	Muhammad Raihan Al Kafi	muhammad-raihan-al-kafi@example.com	\N	$2y$12$579UqgbxC7VDGjCs6WKcTOo.I4hzejcC6jV8o1M4oGZLsM95LGNuW	\N	2025-07-25 08:29:48	2025-07-25 08:29:48	\N
b0891708-3d35-4b91-bd1d-2407fd615b50	Geiva Windya Florentina	geiva-windya-florentina@example.com	\N	$2y$12$SeWpaU0he.ysxKgjoXXFt.ZmvEM.ZG1N/6HFQ1FtA5PgVgCp8t9A6	\N	2025-07-25 08:29:49	2025-07-25 08:29:49	\N
284a73bb-32c2-4428-9775-f217fde93c8b	Habib	habib@example.com	\N	$2y$12$tWx0qBOR54fN8Eya8KCi..lDQVSnnTK5CofWgU05eRkC33C5wbxzW	\N	2025-07-25 08:29:49	2025-07-25 08:29:49	\N
c3b8e955-6ee7-45e4-b402-6bc8d99a64ab	Bima Nugraha	bima-nugraha@example.com	\N	$2y$12$xglfiLkG7lSZGLeLpmHdCOo32XyNB9xWPO1G5yOitNhZ4wzievbsC	\N	2025-07-25 08:29:49	2025-07-25 08:29:49	\N
16f9b2b6-2bf1-4d3a-b547-1eea68a57925	Jalu Putra Pratama	jalu-putra-pratama@example.com	\N	$2y$12$Xi9qW8nK.HFf2hfQYjo7eefGPfJn5aThZI8mXn1387YA4f02VesyC	\N	2025-07-25 08:29:49	2025-07-25 08:29:49	\N
3e7526c4-7b98-4d59-91d8-042eb04cb941	Azalea Shazfa Darmawan	azalea-shazfa-darmawan@example.com	\N	$2y$12$1l5YpsX1KUqA4wi9Y0BL0Ono6yiVNIwgefAuJ/h1jPY3DYSROlVJe	\N	2025-07-25 08:29:50	2025-07-25 08:29:50	\N
6af15afa-f5c7-4cd9-8d99-9af9501602be	Shaqueena Nazafarin A.	shaqueena-nazafarin-a@example.com	\N	$2y$12$YyeJxZW6YA/b9PDxpbi7s.pY6QahfWxtL8kfm/64F2qmLXYAmwrRS	\N	2025-07-25 08:29:50	2025-07-25 08:29:50	\N
16ccdf76-8037-4323-bea4-44338ff1dbca	Dimas Virendra Sanjaya	dimas-virendra-sanjaya@example.com	\N	$2y$12$B6w4Xt1xAQROMqMuDOiXruzmt4WZJDSoZqwAHxxbcdK2KbYOz4hnO	\N	2025-07-25 08:29:50	2025-07-25 08:29:50	\N
2352ceac-8974-4efd-8aee-1ae6ede0c549	Sheenaz Zakiya Key Subakti	sheenaz-zakiya-key-subakti@example.com	\N	$2y$12$aJx9HvLZ7FZsot.HVYJk6.fvGtXlZiL2ehBDZrF7BlQBChwMWDZQG	\N	2025-07-25 08:29:50	2025-07-25 08:29:50	\N
90aec68e-10f2-4a5e-8cb5-df395d1298b1	Nirmala Zakiya Ken Subakti	nirmala-zakiya-ken-subakti@example.com	\N	$2y$12$u4naxikVXgdeQS4C9fQlm.jaeieVk1hXuCt9KXltaowhvXryjOPjK	\N	2025-07-25 08:29:50	2025-07-25 08:29:50	\N
061a2ee3-0c2a-46d5-b476-5a46033fe06e	Valerienna Zahira	valerienna-zahira@example.com	\N	$2y$12$hBUjNLNJycTRbh84Q.JEEehadPXXsSNlUr0RoDtxin47oUvsmJWUm	\N	2025-07-25 08:29:51	2025-07-25 08:29:51	\N
27b2dab1-1166-44b5-9d60-2a2f1efd5146	Mahameru Damar Permadi	mahameru-damar-permadi@example.com	\N	$2y$12$uVkrFi08OXyWESyCQ.VdbeT/v.0eKCsBFKLEvrlIAlHxR8eY/tdzW	\N	2025-07-25 08:29:51	2025-07-25 08:29:51	\N
02b2e273-b2ad-4b3e-8b6c-dec63734fb97	Arsyad Mirza Al Mahri	arsyad-mirza-al-mahri@example.com	\N	$2y$12$0Hlt9lm.5uuntTHJOi8kNu1ZOm9qAbaC.t4R6g6HsbHqHJoQEzwqW	\N	2025-07-25 08:29:51	2025-07-25 08:29:51	\N
6ec3adde-e700-4161-9d98-65adeb43f4a3	Lina Mambaul Khusna	lina-mambaul-khusna@example.com	\N	$2y$12$lTYGF8iPyoawdCu1t/WYjerhuXJqCo7tHEdWooLe1.piD2.IGSssm	\N	2025-07-25 08:29:51	2025-07-25 08:29:51	\N
0ee791ab-8c58-402b-934e-1ef26f45cacf	Ahzalea Naufal Gigih Baihaqi	ahzalea-naufal-gigih-baihaqi@example.com	\N	$2y$12$jgyZ2ARDWOQ/cmQZsnMtbee/P.1NTtLVZzF5dPZzK/lJcgtnTLDyi	\N	2025-07-25 08:29:52	2025-07-25 08:29:52	\N
88b991c4-d9d0-462b-8961-e0f7e99cfe76	Alifa Azalea Naufalyn Irfai	alifa-azalea-naufalyn-irfai@example.com	\N	$2y$12$XWkChBzkjVBgSO4/1CEwIOqMEIr2MJZCmuyzo1wvuqzNzKWQRHMWa	\N	2025-07-25 08:29:52	2025-07-25 08:29:52	\N
03d12fd1-b354-4b3f-b1e7-e9d03de2b7ea	Yusuf Jalalludin Putra A.	yusuf-jalalludin-putra-a@example.com	\N	$2y$12$sYceNV2uAmY27o5xs9EVU.xE9cD1UmwBcCLtKW5yn4rM/IBjhP746	\N	2025-07-25 08:29:52	2025-07-25 08:29:52	\N
fd1cfaa2-21c6-45a0-b780-7fe668dcdf0c	Satya Qodama Talqin M.	satya-qodama-talqin-m@example.com	\N	$2y$12$0O6v8fp/65jGEAmnTfcDDO1T10f8OQIoSPVxuOFL7ZZkw20KMvXN.	\N	2025-07-25 08:29:52	2025-07-25 08:29:52	\N
136b715d-4937-4386-a573-035c640fa994	Javier Alfaro Findra	javier-alfaro-findra@example.com	\N	$2y$12$sT.ac.dhU1alYuMfoZ1D3eaAguK9PzQu1Q2KsxgwxvZNVoI.dQlyG	\N	2025-07-25 08:29:52	2025-07-25 08:29:52	\N
10f9697d-fc24-43a5-9efe-1574cee2603f	Callysta Razeena Nathania	callysta-razeena-nathania@example.com	\N	$2y$12$LpgHfZuVSlkssxLytg76r.xXE1So9JF8XqanOSJJ78S9oFyjjWpl6	\N	2025-07-25 08:29:53	2025-07-25 08:29:53	\N
1c2227ab-9ee4-420c-bdaa-b5b7b0bfbdef	Queen Aulia Az Zhara	queen-aulia-az-zhara@example.com	\N	$2y$12$3L5wYVjL1JcCk4kNwrnFleHiAfX./zzx0fwDzkFQ0WRjKGZgn/F0C	\N	2025-07-25 08:29:53	2025-07-25 08:29:53	\N
20322b3c-affd-4780-a842-e40943133273	Bima Eka Kasatria	bima-eka-kasatria@example.com	\N	$2y$12$evA1OYO3.siuaULSOVCIoOsdewydsAl.32xlFG.9k5b02jiE.cenm	\N	2025-07-25 08:29:53	2025-07-25 08:29:53	\N
660b9b0e-67c8-48c8-85ba-925c8157b523	Raihan Kenzie Hamizan	raihan-kenzie-hamizan@example.com	\N	$2y$12$uTfTGnwMSm/NhRgAlXN3ge0PoSbsZq3u449ra/Ihrsm9.XvbesqN6	\N	2025-07-25 08:29:53	2025-07-25 08:29:53	\N
246921a6-8f89-4164-8ceb-5c4b3187bb74	Naufal 'Aqila Havindra	naufal-aqila-havindra@example.com	\N	$2y$12$.Olt8d1me.Lf2CGFAQ3Oae07yiBNM8cqjlSPT1svZCJRvDiUmqRcK	\N	2025-07-25 08:29:54	2025-07-25 08:29:54	\N
517edd37-2b9c-4485-ba25-c40d90799a84	Alberno Zevares Natha Prawira	alberno-zevares-natha-prawira@example.com	\N	$2y$12$VmLblJVhPmFsvbhPVuvY3.G4lNtQGPn3NpVovGVL.GYCNzlAkL39S	\N	2025-07-25 08:29:54	2025-07-25 08:29:54	\N
71571f59-b514-4da2-9f2d-7220ba10bedc	Mutiara Alexandria Rahmandana	mutiara-alexandria-rahmandana@example.com	\N	$2y$12$WvjqDOtLpbfwB8RDmICRL.ZhmZN8SzzLnGSF8T0ugfLfLHQsREVUm	\N	2025-07-25 08:29:54	2025-07-25 08:29:54	\N
63af2141-c919-467f-91a4-bd250653d5b2	Javier Al Fatih Rahmandana	javier-al-fatih-rahmandana@example.com	\N	$2y$12$iU6lyEVnAz6uRbkQjq0LWuRkY6OakZHSJVc2xylgIpsw5h26z4tbe	\N	2025-07-25 08:29:54	2025-07-25 08:29:54	\N
9ec2c262-7dd7-4f69-a4f3-82075b1dee08	Ahmad Al Ghazali	ahmad-al-ghazali@example.com	\N	$2y$12$8jk5SZRjwhjrz19O6bLE9eXkcGFKMX4yv6NQGoV1X4xaBxiUZ9orS	\N	2025-07-25 08:29:54	2025-07-25 08:29:54	\N
9100f741-f0bb-49fa-a502-cff4cb8cf98a	Dary Arrifda Wardatul Zahra	dary-arrifda-wardatul-zahra@example.com	\N	$2y$12$08ziryc35cvgnF1.lK2orOYhwn8GKs4L8RrqST6iZDSsl85TxUZIS	\N	2025-07-25 08:29:55	2025-07-25 08:29:55	\N
4b9630f6-888c-416d-baa7-59544ab6c77f	Enno Ardelio Galvin Prawira	enno-ardelio-galvin-prawira@example.com	\N	$2y$12$7uFVdXIWMF6CYWi1HHO6FOnsjNt4YJUQX324ZoVla7zweSrvF9zYa	\N	2025-07-25 08:29:55	2025-07-25 08:29:55	\N
775940f4-0ef0-43cd-bbee-622bbd9a9601	Keisha Septiana Dewi	keisha-septiana-dewi@example.com	\N	$2y$12$pNODhjR5159fHci41yic7eapJErNg6BV4WOiSTrfPc0HHKoo2CsUS	\N	2025-07-25 08:29:55	2025-07-25 08:29:55	\N
4efba7b7-6a91-497a-a456-5dcf45ba6316	Diah Nayla Rahmaniah	diah-nayla-rahmaniah@example.com	\N	$2y$12$IC1eGPwgYv5.XB69hRZ6nuAjufX.3zwGMO.ra1bzItNe0g4uLV1WW	\N	2025-07-25 08:29:55	2025-07-25 08:29:55	\N
25ff3b8b-cead-47ec-88ea-2c0a3e612643	Binar Cikal Cendekia	binar-cikal-cendekia@example.com	\N	$2y$12$nEDWQo45aRcYCsCychvss.zXKPEgj7J5CazrpRBzahXj9QjfqmZIq	\N	2025-07-25 08:29:56	2025-07-25 08:29:56	\N
cae08517-6a2c-4e6e-bffd-cba8e5952a10	Flaurisqueena Oxzallequa Virelly Ratifandy	flaurisqueena-oxzallequa-virelly-ratifandy@example.com	\N	$2y$12$sXYtYdpeKo.HjWdezVyX8.XXXI23wrz5TA/ugmJXD7.mkhV3Yj/r.	\N	2025-07-25 08:29:56	2025-07-25 08:29:56	\N
004b68a9-5e4e-4b35-b3ad-ab6f51eacf60	Muhammad Yusran Aktaya	muhammad-yusran-aktaya@example.com	\N	$2y$12$i0cFfms2okFT.X9/ARH.yuA8X4rFC1zMSMbdj9GvSk9XVmyhklnaG	\N	2025-07-25 08:29:56	2025-07-25 08:29:56	\N
d8bc127b-d642-4bb6-9258-91b59b0be30a	Muhammad Yaqzan Altaya	muhammad-yaqzan-altaya@example.com	\N	$2y$12$KxyeOrL68QAHVhcvtmZwk.JvZxcAsho6MmPrqqjswM8eibVRxcOwi	\N	2025-07-25 08:29:56	2025-07-25 08:29:56	\N
e7a10106-0ae3-4951-bb55-13999fd786e0	Jiro Al Athaillah Arfauzan	jiro-al-athaillah-arfauzan@example.com	\N	$2y$12$qPA0wFYxyqqPCPzTSfWhh.rtE6ZaykzytigofUPD5r8keeuhLZb3i	\N	2025-07-25 08:29:56	2025-07-25 08:29:56	\N
9aa326b6-17a3-442c-9ed3-8609beedd42f	Naumi Mariyam Cahya	naumi-mariyam-cahya@example.com	\N	$2y$12$jXyYVpF6wRLPPUQtSTJi/u7g5irP0Vg0gQw/vxJJwaaqiu1sNzG36	\N	2025-07-25 08:29:57	2025-07-25 08:29:57	\N
267f486f-3338-4fb0-9aad-4b8d1f09a3ff	Galuh Nayu Aqvan Cahya	galuh-nayu-aqvan-cahya@example.com	\N	$2y$12$kjEtCJ0.VQXrd2Yerrfn/uQEloXn2vtiKNzoiWeb0AHMBtmrxkwDq	\N	2025-07-25 08:29:57	2025-07-25 08:29:57	\N
ae07b29e-2a34-4d5e-ad88-d3ea2f54a863	Fanaya Almira Noerantika	fanaya-almira-noerantika@example.com	\N	$2y$12$43ZrZbbKFR84/mecOFyyhezhXUYozkHCm95unV9F1KSaWPcydZIvK	\N	2025-07-25 08:29:57	2025-07-25 08:29:57	\N
1c143055-cda1-46e0-9c18-0c4f59a36059	Adisti Putri Jayanti	adisti-putri-jayanti@example.com	\N	$2y$12$B8fibYA.PrsZ1g1PAr25q.X6OFNDW2NUNykT876ArwWA6A2v6kLSS	\N	2025-07-25 08:29:57	2025-07-25 08:29:57	\N
d7a0c422-f7e7-431b-935c-71ded456a622	Gwen Aurelia	gwen-aurelia@example.com	\N	$2y$12$NoMlhbEtLQKbub1G261vG.aFZGiLbIf6IV8YQejUcTcin4iH6WmO.	\N	2025-07-25 08:29:58	2025-07-25 08:29:58	\N
cafe6d6d-9469-4714-aeec-3a3fb7fdb8fc	Khayla Almeera Arif	khayla-almeera-arif@example.com	\N	$2y$12$LArXjLbj.FtV9HElBmHx9Oqq3DLlocBSQNEfI7tcb4uUM1799Vs0u	\N	2025-07-25 08:29:58	2025-07-25 08:29:58	\N
16d25c2b-f3b9-400f-bca9-1cb9e9b2a73e	Rayyandra Ralea Pinnega Azfar	rayyandra-ralea-pinnega-azfar@example.com	\N	$2y$12$OK1qKgTruSs7VN0vjpNKDO2qBNVfAdxhTHnCKsc.v61VnrQhiWMz6	\N	2025-07-25 08:29:58	2025-07-25 08:29:58	\N
d60b60f6-0ed6-4dda-8de7-d0e6d9d5a82f	Dyah Jingga Maheswari Wijaya	dyah-jingga-maheswari-wijaya@example.com	\N	$2y$12$Xp1xnjSLV4OIQJfQ/oKx.eayNPO1qDTWcQPX8fAeXY6QU.FGH.zTy	\N	2025-07-25 08:29:58	2025-07-25 08:29:58	\N
732d690c-595a-4743-af5b-64100c1262ac	Jacquenetta Gladys Bernice Yunanta	jacquenetta-gladys-bernice-yunanta@example.com	\N	$2y$12$aTN4J39lYdw1nRRYqhS/me/9.0VXOkr0KLbT9s1xSzFB8hDNMO3nS	\N	2025-07-25 08:29:58	2025-07-25 08:29:58	\N
c2c86dba-9a40-43cb-b066-9fd261732a85	Nadaila Raline Nugroho	nadaila-raline-nugroho@example.com	\N	$2y$12$Z7eMGmAZXryXmIF9gk5Ev.XooXU6oa6lB0sKm4MrO3kYCCdEgvdim	\N	2025-07-25 08:29:59	2025-07-25 08:29:59	\N
683a8c24-3f58-4fc0-bc32-b27d41323213	Tristan Auf Kurniawan	tristan-auf-kurniawan@example.com	\N	$2y$12$DGv13Rnnsbn8MPTp2vM5WuUynG96SFe/3g.u.0ociWSIB186/zLG.	\N	2025-07-25 08:29:59	2025-07-25 08:29:59	\N
5e62aed6-6a26-413e-a386-e95a9e90c331	Carissa Arief Khumaira	carissa-arief-khumaira@example.com	\N	$2y$12$rSR4A7NsVANOo./h/33xMOm031HbemGPgdJhiK5W7yi9jAGTj4ALK	\N	2025-07-25 08:29:59	2025-07-25 08:29:59	\N
4591fcb6-821d-4e71-8d25-88a35e77bcf3	Brawijaya Ageng Maulana Jati	brawijaya-ageng-maulana-jati@example.com	\N	$2y$12$AlRXxJOI6mMlZIrNCUQDZ.VXWe.dOLaZLS2CUp4/.9u5ypM47aura	\N	2025-07-25 08:29:59	2025-07-25 08:29:59	\N
c8f1d935-136c-4b5f-8e1a-f8ad926d58b7	Fakih Sean Attaya	fakih-sean-attaya@example.com	\N	$2y$12$xxjBv9zLmiO0qMCi.GY5neMJvJGd8SPXnfvqggM9JupQWwmVJcGn.	\N	2025-07-25 08:30:00	2025-07-25 08:30:00	\N
774e19cb-9394-4e25-a3b1-5e50918a4fa7	Zizi Arsyfa Cahya Salsabila	zizi-arsyfa-cahya-salsabila@example.com	\N	$2y$12$bc3zRHJ/WbMAZHEwV212heOEi.ukhibf3E0dU1NzAm7bSyh5vJuOS	\N	2025-07-25 08:30:00	2025-07-25 08:30:00	\N
5a367acd-caa0-4933-a67e-07d0d3ab6d96	Dipa Pradana Wicaksono	dipa-pradana-wicaksono@example.com	\N	$2y$12$EdtalBfoDfXMMj86KG6YH.uoxkmnypwJT4BU82frbXGWApxaybEyy	\N	2025-07-25 08:30:00	2025-07-25 08:30:00	\N
aeaed269-75c6-4b26-8c26-886093191238	Nadine Humaira Shafa	nadine-humaira-shafa@example.com	\N	$2y$12$OWFkGNadrCpyPzFXw/OSN./3qlVNRD.Cd78MqJwaN9HxRERnjinaW	\N	2025-07-25 08:30:00	2025-07-25 08:30:00	\N
5c72695b-ca08-4f3f-9999-91908b32b1b3	Muh. Aidan Sakha Al Fatih	muh-aidan-sakha-al-fatih@example.com	\N	$2y$12$b3vJrKsvWpxqJB2gocOVTORavPzmMx0Mq9Ntkh0H/Cej.muMSV3EK	\N	2025-07-25 08:30:00	2025-07-25 08:30:00	\N
cb28b6b5-356e-49ab-9616-cc0bc4c6062b	Medina Aira Salsabila Al Fatih	medina-aira-salsabila-al-fatih@example.com	\N	$2y$12$TdlWYCIcWDP/vtxIaOQ5Fu5rTDpeXie0f1siOzDrkj3/RoMKaPVZ6	\N	2025-07-25 08:30:01	2025-07-25 08:30:01	\N
91b79c13-5640-4fa6-9d2a-a6afa66595f8	Kanzia Fadhilla Wardani	kanzia-fadhilla-wardani@example.com	\N	$2y$12$xfID8C/387sUfvmsSLcY6.VJcpclbckowqimQtX896.vYHyC1zuJq	\N	2025-07-25 08:30:01	2025-07-25 08:30:01	\N
27476907-2714-477f-a8f9-6862afd9847a	Sabila Alya Nisa Afifah	sabila-alya-nisa-afifah@example.com	\N	$2y$12$IZxPifufHw92AhEpjBvIMOoJqrgl4JfQZDNNHqiLOUHRxReS.z0bO	\N	2025-07-25 08:30:01	2025-07-25 08:30:01	\N
46d0b1e1-0b15-4c8d-aefe-a6483cd8fd52	Cantikka Alya Maharani	cantikka-alya-maharani@example.com	\N	$2y$12$JJov1f2Y928IANpjD347ye8omv0wdoVMMOKFdi8z4nKSzFeF0oKf6	\N	2025-07-25 08:30:01	2025-07-25 08:30:01	\N
eda52f5f-a44a-4947-8607-1fed76f55c3e	Asya Awanda Lazuardy	asya-awanda-lazuardy@example.com	\N	$2y$12$S/JRPmoG8mK1fws21LTF9uFd.CwuAMV84XTYaBdDcWvUIbBsCi3.m	\N	2025-07-25 08:30:02	2025-07-25 08:30:02	\N
090d86d6-cfdc-4684-97ed-ae45f05714ec	Arsyila Putri Mahardinata	arsyila-putri-mahardinata@example.com	\N	$2y$12$WYlZHEnbHZ64GTYV2uzMpOELYZk.ahoz9FPUzQkt.n7LVG4YCbUUC	\N	2025-07-25 08:30:02	2025-07-25 08:30:02	\N
4c5aa838-dc35-4fc4-bca3-d1ba5aa908bf	Raniah Sekar Atmojo	raniah-sekar-atmojo@example.com	\N	$2y$12$cO0d0SPqsjiq3ih4uhRWgeWxqk3vFqisrIebICEFmlAx0iIsW/HfK	\N	2025-07-25 08:30:02	2025-07-25 08:30:02	\N
144ac562-2ff8-4e78-ba4f-13f367cc21d9	Muhammad Zam Zam Irhamni	muhammad-zam-zam-irhamni@example.com	\N	$2y$12$.NDWGW5KRQVQVyZaJWY2LuFl3rYwuICvzSYlq5A0cxgQzlTTYYFeK	\N	2025-07-25 08:30:02	2025-07-25 08:30:02	\N
31cd9876-579e-4339-a639-2be90e15ef2a	Muhammad Arkhan Al Farizi	muhammad-arkhan-al-farizi@example.com	\N	$2y$12$1Bdaal6WWxLI0JUGS0FiluwyaZ/hvVzpAUZ4LaEnjWzdvO4MFnnmO	\N	2025-07-25 08:30:02	2025-07-25 08:30:02	\N
7f8d258a-c19f-47ef-9b0e-cf1174440f74	Arumi Shanum Azzahra Winahyu	arumi-shanum-azzahra-winahyu@example.com	\N	$2y$12$IMuBN/C5hbJa63swePnkd.XztWGvsnp/BCauvwewnglwNgBT9.lC6	\N	2025-07-25 08:30:03	2025-07-25 08:30:03	\N
5e6189d4-d8fa-4020-bd9c-dd65cff85e12	Achmad Fadli Abiyyu	achmad-fadli-abiyyu@example.com	\N	$2y$12$luGXtWFjDG0UedbC4QALGONyRwZ/IYVfSOMs3P8.lYXowUHgiyleG	\N	2025-07-25 08:30:03	2025-07-25 08:30:03	\N
1b27142b-409c-4c97-8be3-8cfbad9686a3	Adeeva Balqis Huriyah Rafanda	adeeva-balqis-huriyah-rafanda@example.com	\N	$2y$12$bXJ/VlduRwKjVpsLsfCUhO4R6cuYsjMn7ZxQAN8k.xmJrJbAp6G9y	\N	2025-07-25 08:30:03	2025-07-25 08:30:03	\N
f88895f8-d7a8-4324-a35a-f91a3c139de9	Jihan Zhafira Humaira	jihan-zhafira-humaira@example.com	\N	$2y$12$cCbr1CoYQTdnEF5Z1COfGuFglfpkLDYGBT4zTb.DhUAQSDYxoeBhy	\N	2025-07-25 08:30:03	2025-07-25 08:30:03	\N
18d95372-b70b-4d71-9c87-8b91e07f83c6	Arum Sari Khoiriyah	arum-sari-khoiriyah@example.com	\N	$2y$12$ReSwi5GH8NdY7UY4KOPP5OLwJxSU4kcny/3VYNl4SwB9bWvbd629u	\N	2025-07-25 08:30:04	2025-07-25 08:30:04	\N
b03ea5bb-d604-44ca-a88e-09de85b810e8	Zaskia Novara Khoirunnisa	zaskia-novara-khoirunnisa@example.com	\N	$2y$12$sRSjKBDKzd0305t9y6ctd.jPcObSyFm1eD2P3cXR/ybIPuMQJCxC.	\N	2025-07-25 08:30:04	2025-07-25 08:30:04	\N
6624c7d1-0ec1-4c9f-8517-6f85228017c6	Weka Dwi Hanka Yudanta	weka-dwi-hanka-yudanta@example.com	\N	$2y$12$m4ESTRPwv3dYXpjZkvkNn./ohOyzPZMywSaRvgb/PvX0NQovlFsNa	\N	2025-07-25 08:30:04	2025-07-25 08:30:04	\N
33429f7d-4a05-43c5-9928-bbdb60e52161	K. N. Mustofa	k-n-mustofa@example.com	\N	$2y$12$yPgt6RC9AAUgBuSxq/VrN.Hy68MvHO7M.sbqgY37eKXkNm4DNwRS.	\N	2025-07-25 08:30:04	2025-07-25 08:30:04	\N
407a9dfc-5714-4ea8-8f73-6734ed7af0bf	Saqeena Wahidiya	saqeena-wahidiya@example.com	\N	$2y$12$6DtMp7jbT.2.KBsCEYlEdu9G5i4Bt1KmncFnvRY48N9VUK2vjCy4q	\N	2025-07-25 08:30:04	2025-07-25 08:30:04	\N
acfa0567-076d-4cba-918a-47b6afbaf225	Elshanum Kayshila Asha	elshanum-kayshila-asha@example.com	\N	$2y$12$qIF6BMKhQNge3BwOeiGHA.uwy9QaVZ509wDu/1Xe0vI8SZVMBKWqC	\N	2025-07-25 08:30:05	2025-07-25 08:30:05	\N
044ea8d1-9b8e-48a2-b2e8-a7e62c0d2dac	Talitha Almahyra Radiansa Putri	talitha-almahyra-radiansa-putri@example.com	\N	$2y$12$iHsFv24/oVCC04X2jAhVbeYFM3kDK5XBG4Zss.2ESh0xm.5O7M5um	\N	2025-07-25 08:30:05	2025-07-25 08:30:05	\N
c37edef0-1d10-4154-86d8-9d8faa0da4de	Arsyila Fariza Azkayra Zahrany	arsyila-fariza-azkayra-zahrany@example.com	\N	$2y$12$QkrlFoe9YmxB5CR2Ml1DWON4OiHVQZue7vljIgDKCcV9sJ6zdxmU.	\N	2025-07-25 08:30:05	2025-07-25 08:30:05	\N
24c36d66-9f9e-4587-ae99-923a7b99ef08	M. Ghiffari Radeva Al Fawwaz	m-ghiffari-radeva-al-fawwaz@example.com	\N	$2y$12$Yu2wrni54h4HcFjRYJTGcuOEKO2Vv3I9JOWAgB7vHj08pvunKxyCC	\N	2025-07-25 08:30:05	2025-07-25 08:30:05	\N
5321f2d6-4a30-4f90-9aae-c4ab4c8f51b8	Calista Jeffy Aulia Dirga	calista-jeffy-aulia-dirga@example.com	\N	$2y$12$VL759HwSDdDYFFLC.4aFc.9K0iXDJnvfyLLtiLXoqcBVD/AhuFArW	\N	2025-07-25 08:30:06	2025-07-25 08:30:06	\N
952bd2dc-499c-4a1d-b027-ed2efb722031	Muhammad Zhafif	muhammad-zhafif@example.com	\N	$2y$12$rB/zXOmq./cI3dz6WA4/8.Hv2c7w3SeqppnRUauBrrNMGWQWJjiFq	\N	2025-07-25 08:30:06	2025-07-25 08:30:06	\N
15ed1344-22df-446f-9eb2-54e7578465b8	Humaira Nur Aisyah	humaira-nur-aisyah@example.com	\N	$2y$12$.vnpQd0ETQjBh.7F3rClQesL91N4XTxGL7geiRgWwaVatSIXHkKXa	\N	2025-07-25 08:30:06	2025-07-25 08:30:06	\N
03d6a49d-10dd-4e11-ac77-b527a72d45d9	Pratama Oda Firdaus	pratama-oda-firdaus@example.com	\N	$2y$12$iTaW95bV5RyzUakBSaihJuNrZP9Ku88VVXlOgNdaltIzGN7M..7Ye	\N	2025-07-25 08:30:06	2025-07-25 08:30:06	\N
8abd43c0-b74d-4747-bc2b-f646b43f3102	Maula Ahmad Rafie Habibi	maula-ahmad-rafie-habibi@example.com	\N	$2y$12$jF/oJr2SZGf3yhKbwFOatOQJHtpzwWIWCov21OsitaPOHnO7VGCbe	\N	2025-07-25 08:30:06	2025-07-25 08:30:06	\N
a7e1e23a-a6d3-450e-8400-a281c81c0784	Muhammad Azzam Rahardhan	muhammad-azzam-rahardhan@example.com	\N	$2y$12$mkOz1wkZWqac.kbaY/Q06uihrCSP89LABxIScHkau3Tx6rftD89xK	\N	2025-07-25 08:30:07	2025-07-25 08:30:07	\N
785dea49-571c-4b40-a8f6-3fb9f5ea4e34	Nizza Athaya R.	nizza-athaya-r@example.com	\N	$2y$12$WL7mtBq2LEwBYSKD411.jeaedqHk.C7LTW27xgkJ9/2nrPzUt8dEO	\N	2025-07-25 08:30:07	2025-07-25 08:30:07	\N
6f55225f-3bc3-4bc7-90fb-d5ac2cb2d3ac	Keysha Monifa Aulia	keysha-monifa-aulia@example.com	\N	$2y$12$Z9rloxkKKthPpYiSvqGmzOH0Of7nZxXoMsIuFj/pbpW2cxUxLUeaO	\N	2025-07-25 08:30:07	2025-07-25 08:30:07	\N
208ab830-4685-46a4-9576-a9eb1261b2ba	Alfira Yulia Putri Sudarsono	alfira-yulia-putri-sudarsono@example.com	\N	$2y$12$.52o1JmVUBA/73.BTMo8FuchWE6bQxB1FZSqPHw7EFh9NO7UWSPOe	\N	2025-07-25 08:30:07	2025-07-25 08:30:07	\N
8377218e-27f9-4046-94ea-e89383f52fdc	Akila Nanyamka Ramadhani	akila-nanyamka-ramadhani@example.com	\N	$2y$12$mPH5RicOOXSoJclVqroC7e1VZH5Q/vQK4mYnLEoFnvn9H7TQz3pCC	\N	2025-07-25 08:30:08	2025-07-25 08:30:08	\N
caecd3c2-4e6d-4cca-9cd6-dfc973b40d6e	Muhammad Riski Novanto	muhammad-riski-novanto@example.com	\N	$2y$12$VatjL1Rj8UnKOEcKYemdp.WzPJYjVhuPJWbmUeJlooOTZVsgI61eu	\N	2025-07-25 08:30:08	2025-07-25 08:30:08	\N
85a3559e-4884-4bd5-ad44-9a072f422822	Adhyastha Rasyid Permana	adhyastha-rasyid-permana@example.com	\N	$2y$12$kdmGao.P8QoT/HpvZy8CDOD3to0DTeU3m/ilMv7b1u7VHeLI7WfTK	\N	2025-07-25 08:30:08	2025-07-25 08:30:08	\N
02bd4a94-4b3a-496f-935b-5da95e3884a3	Alexandria Rhiby Zevanya	alexandria-rhiby-zevanya@example.com	\N	$2y$12$Cp1opPtWE7O.SrRRqREqo..aUErxU1QdMj7.qeqlkHuL0d/8VIQjK	\N	2025-07-25 08:30:08	2025-07-25 08:30:08	\N
a05f298b-bc45-4925-a5e9-f11d7b7efcc5	Essam Adya Jaya Altamish	essam-adya-jaya-altamish@example.com	\N	$2y$12$1FExyPmLgbpwIN6OmcR0p.yH5mFhq8EBZ6sb05I7LVpZ3ybBK5DA2	\N	2025-07-25 08:30:08	2025-07-25 08:30:08	\N
b2045dec-1ee4-46ea-a497-1742cca7c3f0	Fida Qurrotu Aini	fida-qurrotu-aini@example.com	\N	$2y$12$SyIf22XVzMKOdIPkM8a.Y.mQisapYigAgxT1ccSqkOkf5RwD7ulXC	\N	2025-07-25 08:30:09	2025-07-25 08:30:09	\N
ad65c691-3de5-4eff-b38a-f16205324e9d	Narenka Athaleta Sabrina	narenka-athaleta-sabrina@example.com	\N	$2y$12$j97hQulKLltmT9KK6lk/W.qp/neEB/QMKnB1mShSpydebESTzid2C	\N	2025-07-25 08:30:09	2025-07-25 08:30:09	\N
83d65937-9b67-47d9-aab0-9685a80464ea	Vira Eprina Tantri	vira-eprina-tantri@example.com	\N	$2y$12$iqI032XVsxyzhFJFQWJXY.mGV6OolvpYxEWU6oz3V/nLWguweG87y	\N	2025-07-25 08:30:09	2025-07-25 08:30:09	\N
5d83608a-d33c-494c-9a8d-dcf38c9f71d6	Anindiya Zahra Ratifa T.	anindiya-zahra-ratifa-t@example.com	\N	$2y$12$zyG70wJOq/PSzRRj4JxojOiZ1FB6bx5Xoxm8F8pQnt/nyU.GOIQxq	\N	2025-07-25 08:30:09	2025-07-25 08:30:09	\N
c52d874f-0d89-4cf0-823e-0e3c880db870	Anindifa Zahira Ratifa T.	anindifa-zahira-ratifa-t@example.com	\N	$2y$12$efk6VGjLtHY7G/RhKokbLOu4uBqBfvt3/cxdDJZyd46D246uSqVRK	\N	2025-07-25 08:30:10	2025-07-25 08:30:10	\N
0c7a962c-7792-4075-8d08-102d53ca582f	Erlangga Ariyadi Setiawan	erlangga-ariyadi-setiawan@example.com	\N	$2y$12$rrkQKccVHYfFCKxGMN3MDOBGEHyR/onF8FSKBw6vzqTb0HcUmSoC.	\N	2025-07-25 08:30:10	2025-07-25 08:30:10	\N
1dc29474-d20f-4ef6-a894-dbc96d07c87e	Mohammad Dzakiyandra Aatreya Prasetiyo	mohammad-dzakiyandra-aatreya-prasetiyo@example.com	\N	$2y$12$2op2WweTNuISWAu.E.hKGe/Tiq61POTOCF6w.yUfsG/VraRar5aWC	\N	2025-07-25 08:30:10	2025-07-25 08:30:10	\N
0d5fd9b1-c823-42fb-b38f-5e8257af140a	Gibran Ahza Prasetya	gibran-ahza-prasetya@example.com	\N	$2y$12$ZtI7W409YibarxWmUwQq8uLy20iY2liQ5wqBpOHxC6.4Zdjt2befG	\N	2025-07-25 08:30:10	2025-07-25 08:30:10	\N
61a40dc5-5e61-4fc0-acaf-0bbfcf3c989a	Nafisa Zahra Cahyani	nafisa-zahra-cahyani@example.com	\N	$2y$12$N4tcLNB63D66LOzNqkjn0ORKZAcy5Saoo6IEZm5dJLQtk0grs7li.	\N	2025-07-25 08:30:10	2025-07-25 08:30:10	\N
17e76dc7-5947-4491-be04-ac3424642456	Mohammad King Al Jabbar	mohammad-king-al-jabbar@example.com	\N	$2y$12$/pR6KYUjYJfnh3XUwiTOr.dmOrdBt71Zn9De1c6DxLFEbp70mvUU.	\N	2025-07-25 08:30:11	2025-07-25 08:30:11	\N
b67e8395-5ea1-4ef8-9a64-290deab31c86	Satria Ardhelio Dirganindra	satria-ardhelio-dirganindra@example.com	\N	$2y$12$Ur23LrNAGDdm8TUcYGyN2OkjqN3LqXxbHui95YfayoysW5WBLkjFq	\N	2025-07-25 08:30:11	2025-07-25 08:30:11	\N
61efdf9b-86a6-46d0-bc8d-9b85c4f849ec	Pandu Jati Nugroho	pandu-jati-nugroho@example.com	\N	$2y$12$fW6w.27.avIuy9gsuJSGV.o50.4.aBVXp1mmSyajN7i09//z17sxe	\N	2025-07-25 08:30:11	2025-07-25 08:30:11	\N
e7d72757-37a1-421e-ad4a-c46ba1e7c69c	Adzkya Shakira Maharani	adzkya-shakira-maharani@example.com	\N	$2y$12$r149M5ze3/pf4Ffzov69t.tBw/8crxFp/fWkX70T2hAzogP/73HCa	\N	2025-07-25 08:30:11	2025-07-25 08:30:11	\N
f2bd2cb8-60f8-4da6-8d4d-61a44a69bba5	Hafizh Zaidan Arrasyd	hafizh-zaidan-arrasyd@example.com	\N	$2y$12$Q9XdwCXx2aMtpB8Uxe7T7.tvkYekhj1Hyyy2fH0HoC3dWXev76Qpy	\N	2025-07-25 08:30:12	2025-07-25 08:30:12	\N
a4ceebb4-3ce9-4320-9f3e-8a6158db4420	Alesha Khaliqa Endaryana	alesha-khaliqa-endaryana@example.com	\N	$2y$12$Xz675xISi2zxh6NkAroTt.uffzHD5um3mS/.eFf6PapjrFj0ntQoe	\N	2025-07-25 08:30:12	2025-07-25 08:30:12	\N
9a421081-8808-4419-af66-105424ba6118	Kayyisah Anandhita Az Zahra	kayyisah-anandhita-az-zahra@example.com	\N	$2y$12$x6YS/n6qmkFk6wu.J86j0eoLmY52uZ7uZZfG7xBiGoV/.mYN/jPw6	\N	2025-07-25 08:30:12	2025-07-25 08:30:12	\N
a2800df1-5b5e-485b-a59e-0b8c618ef0a6	Kahiyang Izhea Saqueena M.	kahiyang-izhea-saqueena-m@example.com	\N	$2y$12$ZkhPcO3Ey5kXIo8XWmZ5Zez2/L.YASV0JpWAO7gKgrsmbJf83/7La	\N	2025-07-25 08:30:12	2025-07-25 08:30:12	\N
81464414-bf29-48e9-9d6c-219968d752db	Syahril Ilham	syahril-ilham@example.com	\N	$2y$12$3VtiWaTKh68MRcluT2GRuOCFTsNrOxw8FSJCnyYupux8uc0DZFHFu	\N	2025-07-25 08:30:12	2025-07-25 08:30:12	\N
0478aad2-e274-4f32-868b-40084f18ac59	Ar Sakha Omar Elshaarawy	ar-sakha-omar-elshaarawy@example.com	\N	$2y$12$3kR9Gt0/5oXyZI85Bg2rsOYnbGa8W3cEOJyBiCT3AvnAkzQJkh8gO	\N	2025-07-25 08:30:13	2025-07-25 08:30:13	\N
02613c93-be48-437d-aff9-2d0a714d1bc9	Syarifah Mufidatul Husna	syarifah-mufidatul-husna@example.com	\N	$2y$12$bQRAWk95VHS/DfL68C97ie2x1eLt457FXWpLF451c.g4Hd/sDdfgW	\N	2025-07-25 08:30:13	2025-07-25 08:30:13	\N
2791d479-386b-462f-b934-6eca5b0071f5	Lintang Asri Kawuryan	lintang-asri-kawuryan@example.com	\N	$2y$12$WKXhMgPOeUBRpwnNKOGHDuHsJXnvhki1w/EtKi0j5VBQvn/XxnwjW	\N	2025-07-25 08:30:13	2025-07-25 08:30:13	\N
ef1671fe-2bcd-452f-aaff-63a9296dc60d	Ahmad Farid Nur Hidayat	ahmad-farid-nur-hidayat@example.com	\N	$2y$12$Ojd3EP.8B33IgWI1VWEBwuf/3.nqIMVREk8q31TmZkV4n4Idb7pH2	\N	2025-07-25 08:30:13	2025-07-25 08:30:13	\N
7d68d38e-e6bf-4655-985b-c2919559795c	Habibii Dzakwan Harraz	habibii-dzakwan-harraz@example.com	\N	$2y$12$CMdpXB0Kfs/nOmmIKYcP6eJUow.89zmuxxLAGJa6ASTI0WGZqXj2y	\N	2025-07-25 08:30:14	2025-07-25 08:30:14	\N
cb17a671-5092-4441-9c13-5ccc784cf242	Ezzawa Alranvie Nanda Prasetya	ezzawa-alranvie-nanda-prasetya@example.com	\N	$2y$12$AIBia5/GUu7TJ04Y4GnRsuwmMLjL4ViCDv9pL1AnK3vb4GjpIeObu	\N	2025-07-25 08:30:14	2025-07-25 08:30:14	\N
29035543-a4cb-4d06-be63-e606665250e4	Muhamad Abdul Aziz Jazil I.	muhamad-abdul-aziz-jazil-i@example.com	\N	$2y$12$D7WbfJLqIqC4RttDxrMOU.0mVuQC1WgYc/TwAErUKDfN1PEZdSwTO	\N	2025-07-25 08:30:14	2025-07-25 08:30:14	\N
30045550-9d9d-43f5-97e2-3458563395c2	Queenzha Senandung Ashiqa	queenzha-senandung-ashiqa@example.com	\N	$2y$12$juZnNWetAbFva2e/MdSL8O1ZaanY5lVUhBCogKFTJWP6GKaO4NZdK	\N	2025-07-25 08:30:14	2025-07-25 08:30:14	\N
a1833328-4acd-468f-ac17-67fab8de2e5f	Azkayra Navisha Zehra Saputra	azkayra-navisha-zehra-saputra@example.com	\N	$2y$12$Q8iri.ogUCQPvxyLi09M..BGRCw2s0WzLKdRC1hLiy21M2COjKWc6	\N	2025-07-25 08:30:14	2025-07-25 08:30:14	\N
511829d7-7845-4cfa-b7e0-185602d48fe3	Arfan Khalif Santoso	arfan-khalif-santoso@example.com	\N	$2y$12$YoWgE9psI9H4AJg1NOWDoeG1Bu/39KHnuN.JvSLRFZjDBULUcmyNy	\N	2025-07-25 08:30:15	2025-07-25 08:30:15	\N
20cce37f-4279-4db6-97b4-fee51aca25c6	Nayyara Maritza Widodo	nayyara-maritza-widodo@example.com	\N	$2y$12$rss806yvYhx.bTRBHnvPL.WDQCfW/SZhvdyLH0yWsRx70X2nN2DzG	\N	2025-07-25 08:30:15	2025-07-25 08:30:15	\N
3bd68da3-91ce-4efd-aed1-2072611438da	Naura Kirani Alayya	naura-kirani-alayya@example.com	\N	$2y$12$eM2ndnOBa5Qhq7lipnOF.uFLtkVairW1z/jOSyEot/cAUbfGvk7.2	\N	2025-07-25 08:30:15	2025-07-25 08:30:15	\N
03fb3541-3d58-47d2-9a83-bb86837e56d2	Naishi Shanum Almahira	naishi-shanum-almahira@example.com	\N	$2y$12$tMq2ZoG.kqM.FUgZgfQcz.1uJmw3iwpVVVW6VwdFtToIn3gUGcM7.	\N	2025-07-25 08:30:15	2025-07-25 08:30:15	\N
e2f2d4c5-94d2-401d-8b07-0febc95d5023	M. Haidar Akhtar	m-haidar-akhtar@example.com	\N	$2y$12$N5bi6bAct5Vq9e/x5x0FJOhKKEmHXVt4TTuQfmRiPcBKi8QR5Sa6a	\N	2025-07-25 08:30:16	2025-07-25 08:30:16	\N
84c6cd00-c9e9-4910-a71d-e63dc7abe73a	Nafista Az Zahra	nafista-az-zahra@example.com	\N	$2y$12$9D1UcUtJO.01brTy2V0O.eXl5KK1jl0v1VpLREodystGT/yYAUTTe	\N	2025-07-25 08:30:16	2025-07-25 08:30:16	\N
44fcb43c-ce98-4601-aee2-1914c3dd8b94	Citra Ayu Ningtyas	citra-ayu-ningtyas@example.com	\N	$2y$12$uWAJP8f2HhwiZ0drlG18QOt7fed.BUuZbcDDZS.6xmHt5SSshggpy	\N	2025-07-25 08:30:16	2025-07-25 08:30:16	\N
47b12540-99b6-49df-80c4-faccee0f9224	Tiara Distikumala Zahra	tiara-distikumala-zahra@example.com	\N	$2y$12$9Rn8NEZ.W9cKEedqIsiLQeXrAB3D0QiFsk0JtoTOEDnukG2/fOGg6	\N	2025-07-25 08:30:16	2025-07-25 08:30:16	\N
619da44c-94de-4822-832b-c3bf1c022c97	Kanaya Almahyra El Shanum	kanaya-almahyra-el-shanum@example.com	\N	$2y$12$7s7bWJ0sYQDvW9trwXVJR.A64mUPFZnMfePbCK6BqBmcXM9l8j58u	\N	2025-07-25 08:30:16	2025-07-25 08:30:16	\N
9c57ddce-8638-47fc-861e-3e4bd7f0d087	Dhia Fathin Kamila	dhia-fathin-kamila@example.com	\N	$2y$12$ssgwyWh5x0FE32DR4OQ3D.ieNbbdNOp3nZZNsjHQoNC7QVMNNxGVC	\N	2025-07-25 08:30:17	2025-07-25 08:30:17	\N
6cc7e603-aed1-4d81-9603-9110f891d1bd	M. Rafardhan Al Fatih	m-rafardhan-al-fatih@example.com	\N	$2y$12$pKUD0Nl7cL.08jMjrPXr0.ONGSeEvSeiX.46vHOZBmN/M9Gh.iIti	\N	2025-07-25 08:30:17	2025-07-25 08:30:17	\N
4cfcd7c4-93a5-4e94-b486-66913f9dcb7f	Rafasya Mahendra Arrayan	rafasya-mahendra-arrayan@example.com	\N	$2y$12$/kK2aZiNDSZO/LXRjtlSHO0unNgTMD36GJ46I3y/6Ayk5sElrRFqS	\N	2025-07-25 08:30:17	2025-07-25 08:30:17	\N
ea0327dd-247e-4706-bf9f-bfa1c131e74d	Adelina Khoirun Nisa	adelina-khoirun-nisa@example.com	\N	$2y$12$ZBzHmX8YibTx794iDOwcXO6DlrjsD.bCX4VZJjhRK6YUe8MAQ/Rxu	\N	2025-07-25 08:30:17	2025-07-25 08:30:17	\N
0ebb6d4c-1172-47b3-a216-9d5d4d14adc4	Ashalina Yumna Naladipa	ashalina-yumna-naladipa@example.com	\N	$2y$12$OifuJrGd/dgC965sLb43mO0C6WwBUnuqb7DofRcISw3H9QZqz0pLy	\N	2025-07-25 08:30:18	2025-07-25 08:30:18	\N
6f828990-b5ea-41d3-802b-606396269172	Yusufa Brahmasatya	yusufa-brahmasatya@example.com	\N	$2y$12$5JirTFYNah7kP/D18rkfv.pXEGR3DV20qe24B9nMV.Ch9Fvmr6K7q	\N	2025-07-25 08:30:18	2025-07-25 08:30:18	\N
e3c1649f-1542-46e5-9153-08a6bc42773c	Devina Putri Kusuma	devina-putri-kusuma@example.com	\N	$2y$12$1aelFvaNPHjS0cGNAEKb3O9lW1Sv/vH2M.7CDK0/gCrnamGbft3.i	\N	2025-07-25 08:30:18	2025-07-25 08:30:18	\N
d29fd1e2-d9ce-405c-9c70-6f4a7971dc4d	Rizki Eka Fahreza.R	rizki-eka-fahrezar@example.com	\N	$2y$12$vnj1bAS2sjbb6lD03U40C.vGUeZi0SXatt7bgq.MEAc236sAhbyFm	\N	2025-07-25 08:30:18	2025-07-25 08:30:18	\N
ee73f118-f8e5-4909-8573-132b30a49139	Yazdan Alwi .M.A	yazdan-alwi-ma@example.com	\N	$2y$12$q/yeso1g.v7U2robXNn0huczKv3d5gkk67B/PRH3sjYfTwi6JUg22	\N	2025-07-25 08:30:18	2025-07-25 08:30:18	\N
ace1ddbc-f3d9-4a3a-9f1f-5b3464ac653d	Nazriel Ilham .P	nazriel-ilham-p@example.com	\N	$2y$12$bwrAuEc8/xiMfdnRDvAJqOc05L9TfqpzLZnfO8i/ZXWdwjkqlvDOa	\N	2025-07-25 08:30:19	2025-07-25 08:30:19	\N
8bbf3d96-e6aa-468c-855c-6afdcea9c6b8	Almira Azzahra Vidiyanto	almira-azzahra-vidiyanto@example.com	\N	$2y$12$9us.sUhwtW8ydvqvTPGgyOe5SZmiYNkmvGdxznv069tsdTrBTOOUu	\N	2025-07-25 08:30:19	2025-07-25 08:30:19	\N
20df81a8-cc35-4c5a-9c9a-bb8dde2771a0	Aqil Reynand	aqil-reynand@example.com	\N	$2y$12$5LWB5yfZr4ucQJhw1UMeq.dmJIpyFo0fOqG/VMf3oJJUlD0KXmpYq	\N	2025-07-25 08:30:19	2025-07-25 08:30:19	\N
a6993c87-f84b-4142-b1b3-0b376e1a9e15	Reynand Mahyatama .A	reynand-mahyatama-a@example.com	\N	$2y$12$tWAOwPeH7sAHqkhm2Hj6ceXdfGLO5UGDdeJf1LDVnh2qio72XWoAG	\N	2025-07-25 08:30:19	2025-07-25 08:30:19	\N
d6b26004-0f2d-4c77-9cb0-069d0fbda4af	Maudy Cahya Nafira	maudy-cahya-nafira@example.com	\N	$2y$12$SeZZZCR2z.a.AqRpd9.s5uTYbK8Yq./9QJogYJCHr6td3MOr1rK4.	\N	2025-07-25 08:30:20	2025-07-25 08:30:20	\N
82261805-9b6e-40b9-8026-3fd3900b0489	Zafira Askadina .P	zafira-askadina-p@example.com	\N	$2y$12$5v9BSsbwHQKGbjfCFhoUOueLlu1SselIGyldWEUdIwBvRDWZnw8KG	\N	2025-07-25 08:30:20	2025-07-25 08:30:20	\N
800164e1-faaf-46ee-924a-5d8645afa0a4	Ahmad Fahri Ahza .A.F	ahmad-fahri-ahza-af@example.com	\N	$2y$12$eQrFocUOFw8NtwdOBBhe3OEEm4sXEvYv60QOWqY45BIfrV4bGftgW	\N	2025-07-25 08:30:20	2025-07-25 08:30:20	\N
d0c6e029-5343-4cca-9fb5-f9af03dc85c7	M. Ammar Al Hendin	m-ammar-al-hendin@example.com	\N	$2y$12$Po6UfyipR95BTj2mu.wXcOPf09ZHFF3RxEsIKJaDFJ4J1R1octKUW	\N	2025-07-25 08:30:20	2025-07-25 08:30:20	\N
6c8b3e01-6a48-472e-bf2c-9d4bac0266ff	Neira Aliani Zahra	neira-aliani-zahra@example.com	\N	$2y$12$lHLdGm/gpBGnPx5ao7m.eelLRQicF5TEchXV0uDyliywEFSjwrPUy	\N	2025-07-25 08:30:20	2025-07-25 08:30:20	\N
91f618b4-9450-4bf3-8d75-f54abc4e5900	Fazreen Hanenda R.A	fazreen-hanenda-ra@example.com	\N	$2y$12$xrkfi/qbdQQ3fpIC.vrWWueVHi9iuPP4jO6QDvs5lFQJcn8LEw3q2	\N	2025-07-25 08:30:21	2025-07-25 08:30:21	\N
af88d8ef-961a-4107-92e8-55f75e4c9718	Aqueena Malvansha .W	aqueena-malvansha-w@example.com	\N	$2y$12$Dr6LRN01GaBAxME.aKS9X.zwypacS/uXEb.Wd1yCi1uM85NTs/QcK	\N	2025-07-25 08:30:21	2025-07-25 08:30:21	\N
4784652d-2a0a-428d-9a2e-83922e1cfe7a	Albara Reyvan Putra	albara-reyvan-putra@example.com	\N	$2y$12$d.PfJ6PY5Y19yxTR70le4uT3.k4yW7XNoq644OvTRta9jdVdshAqG	\N	2025-07-25 08:30:21	2025-07-25 08:30:21	\N
19231f71-e3b8-4992-a4e4-5a8affbb9a3a	Azzahra Cantya .F	azzahra-cantya-f@example.com	\N	$2y$12$J8K09JO1VwMyOWWOQUgE1eUQltoyE6WbYSCZ946yOhHQ4r/qBWNq2	\N	2025-07-25 08:30:21	2025-07-25 08:30:21	\N
cbe21751-23de-4af7-ade1-de5f298f328b	Arfadyatama Henando	arfadyatama-henando@example.com	\N	$2y$12$yR/nv2aXv6y2eWwlEQvWi.7gvNSF.fvF0whCmARn3vjwMXXPUY7my	\N	2025-07-25 08:30:22	2025-07-25 08:30:22	\N
9ff7eee9-107b-42ec-92fd-b8c0fbc8dad3	Medina Quinn Oksana	medina-quinn-oksana@example.com	\N	$2y$12$0Z1LzKCv.PEryJWh/1T7.O2P9JQRNLH4zph1VGUvOIc6PTRebhlc6	\N	2025-07-25 08:30:22	2025-07-25 08:30:22	\N
65496ba4-00dc-4438-bd93-e677f9bc30ff	Aqil Achmad Zaydan .A	aqil-achmad-zaydan-a@example.com	\N	$2y$12$G1xqYTG4bCkjuf/J0Lk48udxoObfWFTpJ.w037V1cQzFU4Iisbt/G	\N	2025-07-25 08:30:22	2025-07-25 08:30:22	\N
b0f6ea26-3ec9-4229-bc65-1c2388939bff	Bilqis Faiha Rifda	bilqis-faiha-rifda@example.com	\N	$2y$12$UWznZckziAh9g5q9tM6UN.brviHqiG0Lvv1o9k177Lx3tMt28oF22	\N	2025-07-25 08:30:22	2025-07-25 08:30:22	\N
4235ee9f-a130-4860-853f-c574df8860b6	Salsabila Nada Arasy	salsabila-nada-arasy@example.com	\N	$2y$12$7sNGxsi40VEtoFLjPewFt.QXBmTR9.va0wUBiqgvwRM9Yx/1SuHUW	\N	2025-07-25 08:30:22	2025-07-25 08:30:22	\N
92aee819-7c04-4916-bc50-cdb4a4e4040f	Salma Mutia Azahra	salma-mutia-azahra@example.com	\N	$2y$12$9vB9aS10.qvWOgfXtjhVqOzMfRNSNlysloPGH7c9gxpDjVmf2DpMm	\N	2025-07-25 08:30:23	2025-07-25 08:30:23	\N
187c0bae-ccfd-48f6-9e18-3ccee1a7421f	Belvalerine Ayudisa Gymidjantee	belvalerine-ayudisa-gymidjantee@example.com	\N	$2y$12$KZziC.QCAbROm9iauve0TuaxqFEaw0g0MZMXCF5r/N7RI.MumbFnG	\N	2025-07-25 08:30:23	2025-07-25 08:30:23	\N
c2d2707c-288d-4a4a-af37-321b09f4a19e	Husna Maretta Rizky	husna-maretta-rizky@example.com	\N	$2y$12$y0nSCzi6VjMcj9BqmpGEaubXOYvR0vyuGxUwCvFBMbKWdPmm.hYD.	\N	2025-07-25 08:30:23	2025-07-25 08:30:23	\N
84607a73-b85d-4a85-9d2c-2d7537d230f2	Mikhaila Arsyana .W	mikhaila-arsyana-w@example.com	\N	$2y$12$rwx5yx5IHvh4KWX2qMguy.OtIoE0AXCTEYUt/QvUC6vh8X0L6VIwy	\N	2025-07-25 08:30:23	2025-07-25 08:30:23	\N
5945737e-eb18-4f8b-9a0e-727cf0654f75	Maiza Zhafira Alfanadine	maiza-zhafira-alfanadine@example.com	\N	$2y$12$NWTK2XIUSbF2EQxaYCRNmO/38Pnk1Mzs.mmRQSZNlAJrt.7DUc4YK	\N	2025-07-25 08:30:24	2025-07-25 08:30:24	\N
cdfa019e-b1cf-4267-804c-26fbbad7e66f	Nashwa Aysaqila .W	nashwa-aysaqila-w@example.com	\N	$2y$12$EBtp8r6liyv.6rFUxWCtzu/pih7UD9Qln5iC6iEoJFApWoHuAS2cy	\N	2025-07-25 08:30:24	2025-07-25 08:30:24	\N
8e31fff5-1d6a-4e1d-9852-b163d01dc1e9	Azeema Mikea Alodie .S	azeema-mikea-alodie-s@example.com	\N	$2y$12$5gJ9jKrKSUsivFpZBLBpIeWbgCCWYADFuOvyGHN1EDFOeIlsRiaki	\N	2025-07-25 08:30:24	2025-07-25 08:30:24	\N
41699990-a5e2-4675-837c-6c5597dd6554	Almer Dzaky Fawas .W	almer-dzaky-fawas-w@example.com	\N	$2y$12$uCZ9mmK5Q3L3opW9Lh.Qm.pp1yEfdIGJDKY5piXI1wdaHP4iAjCjK	\N	2025-07-25 08:30:24	2025-07-25 08:30:24	\N
94f69479-f03f-4d81-aa16-a1faa6ff0ca1	Cindy Alfiana Kanita	cindy-alfiana-kanita@example.com	\N	$2y$12$pYN7gtaq4RZ3/osaAh3r3eqfKVLocmT9jiRmydLAmkosOK3L3rYcy	\N	2025-07-25 08:30:24	2025-07-25 08:30:24	\N
9b74c86f-9498-4e53-ac8b-56230a646b6f	Efranda Mikayla A.P.M	efranda-mikayla-apm@example.com	\N	$2y$12$l.XFEGPNltCElC4FgdOxA./4S36dXLPcglrfDtUzuzHss1b5lH4ii	\N	2025-07-25 08:30:25	2025-07-25 08:30:25	\N
c80644e7-4197-4c1b-b13f-cc827c4775ec	Nayla Aqilla Widi S.	nayla-aqilla-widi-s@example.com	\N	$2y$12$HHwXeTBJInvdxUqTPgn1JuYK07yQ5dEXCnCofQ6Xtt5qTSo.jH.wy	\N	2025-07-25 08:30:25	2025-07-25 08:30:25	\N
a45108e2-2875-4843-8d80-ae9562ede3a5	Gracellia Chintya Makarim	gracellia-chintya-makarim@example.com	\N	$2y$12$B.AqAwXe/PDNOSG8ZWDlh.LbO1Wixm.AUY98LwAzTWGt1S/Oir.cC	\N	2025-07-25 08:30:25	2025-07-25 08:30:25	\N
9f481713-5de6-4f83-9e04-7218214d363a	Aghnia Ilmi Alifah	aghnia-ilmi-alifah@example.com	\N	$2y$12$F/MyR36HfNAyeEIXBgvTnOeAc0fajUjqDYHI4TyS3W81s1C3Bkk.G	\N	2025-07-25 08:30:25	2025-07-25 08:30:25	\N
23e331a8-e433-4541-8180-7e2217d37784	Hendrik Alvian Narendra	hendrik-alvian-narendra@example.com	\N	$2y$12$0iTV2FTeHYY.wsJXyRfEDOt2LkvGuLRdIpYyywTLL3ch1Hk3NlnNu	\N	2025-07-25 08:30:26	2025-07-25 08:30:26	\N
283bb429-aa5f-4238-92d5-8e4d968bccc3	Al Khaira Masha S.	al-khaira-masha-s@example.com	\N	$2y$12$9sm2qwSIXOJgZfgqZ0DTxO8EoJWwDJuMgTsQdG61ODMuo.arC2dqS	\N	2025-07-25 08:30:26	2025-07-25 08:30:26	\N
3adf29cb-ca47-43a9-a0c5-c7d3f9027936	Dzakiyah Afifatunnisa	dzakiyah-afifatunnisa@example.com	\N	$2y$12$WZporpzMMz8kdYhXS6dU.u1QRpoChFzCV.p42uQIyQkbagIxMM8F2	\N	2025-07-25 08:30:26	2025-07-25 08:30:26	\N
bf50563d-81fd-42e6-9eeb-69fa6613bafa	Monic Latukonsina .G	monic-latukonsina-g@example.com	\N	$2y$12$zLBxNc2cVv2Mvh6iIQnqheW2Am8J5MsjaG7/i3OLa45nvA.cPLKAq	\N	2025-07-25 08:30:26	2025-07-25 08:30:26	\N
d968e1b2-bc8b-4e17-94d7-04575cf23fe5	Natasya Adera R.C	natasya-adera-rc@example.com	\N	$2y$12$D4qYWJY2LLlcP6ACSyXaJecc8868Pj0tSJsp6zdJ8jPKdvwMhuejC	\N	2025-07-25 08:30:26	2025-07-25 08:30:26	\N
082099ec-f97c-40f1-bc13-30be6924cd6a	M Fa'udz Abrorrizky A.	m-faudz-abrorrizky-a@example.com	\N	$2y$12$ImjJkklG42UrkRsIfNvlkuuWW/h8v3Zt4Jw/5da6vbkOXpCGQrxHy	\N	2025-07-25 08:30:27	2025-07-25 08:30:27	\N
ce17938f-0331-4ad2-9d5f-f784bef26acd	Khumaira Zidny Syakira	khumaira-zidny-syakira@example.com	\N	$2y$12$4QvzulaDP931.a47sPhGY.V3nTduhsHaJxLyrBkrUa3I0hhfETcC6	\N	2025-07-25 08:30:27	2025-07-25 08:30:27	\N
dad0de7c-a910-46e6-aee3-20703485a8ca	Gista Naida Khanza	gista-naida-khanza@example.com	\N	$2y$12$ZFKrtlGuNuBekH002Ip2gOPmzc.j3Mwi3iZV4WIv8f10xL3NqcAme	\N	2025-07-25 08:30:27	2025-07-25 08:30:27	\N
f43e14ce-9b20-4839-9f43-552f2573a2db	Sienna Jazilla A.	sienna-jazilla-a@example.com	\N	$2y$12$H5CTlPUYaLZ6RivFvCxaMu5Jl4kP9DEa5V7h5dDXn.inqKwaWARZe	\N	2025-07-25 08:30:27	2025-07-25 08:30:27	\N
dda208cd-27b6-4569-8741-633a1b7f5fcb	Azzahra Nayla S.	azzahra-nayla-s@example.com	\N	$2y$12$XUBMlOcm6MAtnxSONRXCp.AviJR27pJ1Z8iqbsJcRApPksl3VkXzG	\N	2025-07-25 08:30:28	2025-07-25 08:30:28	\N
aaa3b645-4fda-42ce-a6db-bf453b0f84bc	Wening Talita .D	wening-talita-d@example.com	\N	$2y$12$3VORjHB/Li.Ak4uOkGkbkeaSHuhcUEY5JdZoEaIkG5Ud1AB6Iv15K	\N	2025-07-25 08:30:28	2025-07-25 08:30:28	\N
9b13660b-20da-49d9-8250-10138edd88de	Michael Aprillio Kanaka	michael-aprillio-kanaka@example.com	\N	$2y$12$WNwSHlqp84RLE/cyjfbg9u18aQbdRbApkJUUrM1tOTImYMlnINWmu	\N	2025-07-25 08:30:28	2025-07-25 08:30:28	\N
82afefe8-c3d7-4f7c-a66e-1dd98ea9649c	Haifizul Reno .A	haifizul-reno-a@example.com	\N	$2y$12$nu/LnOWz/BwQRgOxBYy6T.d7LpTZxolymjjGpMvI02CgEeQXXtacO	\N	2025-07-25 08:30:28	2025-07-25 08:30:28	\N
eebb4784-3a40-4cf4-9675-ed7960a83829	Alby Raffasya Ardana .Z	alby-raffasya-ardana-z@example.com	\N	$2y$12$62.2fFFT.Y9GkfVJPEx6J.LBS5jhaUQSfDrqmzU/iDcPEZZvYkRbi	\N	2025-07-25 08:30:28	2025-07-25 08:30:28	\N
78733119-3e4f-4f16-9023-a60d0cf2ffe4	Yuaninda Asyila V. A	yuaninda-asyila-v-a@example.com	\N	$2y$12$IOeYECNklUCJjulNZ9kyNuT53V8pKMGfgLRSfu7sxwl7PnE1RcZri	\N	2025-07-25 08:30:29	2025-07-25 08:30:29	\N
a1e8f60c-341e-4e50-accf-ea862c82d54f	Calisa Putri Oktavia	calisa-putri-oktavia@example.com	\N	$2y$12$/MfOo8RbkpWttUzCQqp7BuveSbSi2rQmDnFelw4g1pSAjtZkXhRlm	\N	2025-07-25 08:30:29	2025-07-25 08:30:29	\N
2874b7d4-9147-4390-9d95-4f4953c630af	Faiha Quensha Putri .D	faiha-quensha-putri-d@example.com	\N	$2y$12$N7FNFSqjDFlQlZDQXnn/hujsUjBDUgy14xpEsQPil3e2WZFhR7hoW	\N	2025-07-25 08:30:29	2025-07-25 08:30:29	\N
0d5ac2fe-a037-42d5-b4fb-8168312cdf25	Cheryl Kinan Shakila .A	cheryl-kinan-shakila-a@example.com	\N	$2y$12$nx4yIJ.okyFIG1iRTF3kfOsW6rtOi4PN.n7hUV.IJRQ/iZzvbjHci	\N	2025-07-25 08:30:29	2025-07-25 08:30:29	\N
b3409900-8a96-4141-9a8a-2d8a0e4a3b3d	Naufal Afkar Rianseta	naufal-afkar-rianseta@example.com	\N	$2y$12$I5SVsUGhxtSFxw8y3DYV2etdKbl/T551TjkMgIgL6q9e.OXbcXhsC	\N	2025-07-25 08:30:30	2025-07-25 08:30:30	\N
6382b646-120d-47dc-8d05-321fc6765bfb	Annisa Ulfa Azzahra	annisa-ulfa-azzahra@example.com	\N	$2y$12$7Jo3rLaevYm4tHACEogCSOS44cqWkpco47QnqY2FBBEE5uK8fXMPy	\N	2025-07-25 08:30:30	2025-07-25 08:30:30	\N
3e6ee944-83f9-4c50-8fd1-a2bf5961d0bf	Mutia Althafunnisa Ardiansyah	mutia-althafunnisa-ardiansyah@example.com	\N	$2y$12$ajZP1TEZhMa7ihlQLnElgOY3K6X6cDBEGeQHMugluJzg02a/E0McO	\N	2025-07-25 08:30:30	2025-07-25 08:30:30	\N
94487394-4879-4348-914d-6ce72f52ba37	Aznia Adelila Faranisa	aznia-adelila-faranisa@example.com	\N	$2y$12$LoGIlHB7ib9LZX6gcUrlZ.dVoz..9RN9zeQ3jSnvVqAsnBza8LPMe	\N	2025-07-25 08:30:30	2025-07-25 08:30:30	\N
67a2269a-26a0-4a2c-b249-7101d79ea3d2	Azni Adellia Faranisa	azni-adellia-faranisa@example.com	\N	$2y$12$J8yXG/IlYhDLyjkL0scRqu/wdyQFansie3TBRuY5NEsXsI617O01O	\N	2025-07-25 08:30:31	2025-07-25 08:30:31	\N
e04ce198-3882-4f38-a10c-28f71fb00c5e	Feyza Alya Afifatunnisa	feyza-alya-afifatunnisa@example.com	\N	$2y$12$8uCjinCUHfPM50mSOEqoq.rYJPOZTpgHVWJi5K/Q2b5lqBZLJzTYa	\N	2025-07-25 08:30:31	2025-07-25 08:30:31	\N
ae214349-6074-43d5-9297-26f94a7c6f75	Kenzie Putra Aryawangsa	kenzie-putra-aryawangsa@example.com	\N	$2y$12$tieOSZ1OaomrD/rf7Vdm2.4wsFgTQoC0lh2hd19S9Dhuri7ThnMgq	\N	2025-07-25 08:30:31	2025-07-25 08:30:31	\N
1563365e-5c22-414c-9ba6-3d7abeb091dc	Kenza Putri Aryawangsa	kenza-putri-aryawangsa@example.com	\N	$2y$12$sfWowuOCoOfBvNV1OVwQiuweCRF/vMF7KhBHe5g8OWmVjkbH7iffC	\N	2025-07-25 08:30:31	2025-07-25 08:30:31	\N
425eb526-8694-4d02-8e32-09232bbbea26	Pradipta Akbar Ramadhan	pradipta-akbar-ramadhan@example.com	\N	$2y$12$W1Izysvomj0AroeoblEXeuFVAu/2HEkLtm511.pQ3nU7npsGmK2Qy	\N	2025-07-25 08:30:32	2025-07-25 08:30:32	\N
435180f9-acec-470a-aa39-391357082497	Rafif Himada Sumartoyo	rafif-himada-sumartoyo@example.com	\N	$2y$12$fZdJ2dNsMMHHDu5MjLUWSuNtMWLq59GZaS6X1Pj1d8uok8j2XRMSm	\N	2025-07-25 08:30:32	2025-07-25 08:30:32	\N
d8d5ada5-8f5e-4315-9b45-8364b215888d	Nizam Ramadhan Al Mukhlis	nizam-ramadhan-al-mukhlis@example.com	\N	$2y$12$J1esWLp64qAwYGIvWwNIPeKJP61rnjoUULrT0s4WmrSxGLAfUVUkm	\N	2025-07-25 08:30:32	2025-07-25 08:30:32	\N
bc8a24d3-1e2f-4ddb-ba89-1a2799a9d38e	Alisha Khaira R.A	alisha-khaira-ra@example.com	\N	$2y$12$VWPdcHtcFOhL3lb64RoEZe6AGk7d53zld94LLl8XPK9pXu8e6SJra	\N	2025-07-25 08:30:32	2025-07-25 08:30:32	\N
ad90d69a-5825-498a-b1e6-3d82bc7a145a	Kenzie Alavaro Maulana .I	kenzie-alavaro-maulana-i@example.com	\N	$2y$12$6k5hZueBn6Tt.CXfXmtSq.s4dfHoC0TLWnLwhFkHmqOCaDhCHqGr6	\N	2025-07-25 08:30:32	2025-07-25 08:30:32	\N
78eab314-7005-41d3-a7be-12869432b74b	Kayla Azka Queisha .J	kayla-azka-queisha-j@example.com	\N	$2y$12$N9aZK7ERBmYv9TqGlX778.MnKWWzkprbJEmxP8NFSV4J2Mm7Uz/yW	\N	2025-07-25 08:30:33	2025-07-25 08:30:33	\N
830b2755-62a5-4875-9b7d-a05e32c6008f	Tasya Nurshakila .P	tasya-nurshakila-p@example.com	\N	$2y$12$pm/H6AhVbwI7sDu95L6jQ.Cx9UMJL61xrE4pJw9XRKvbXTih/.Bmi	\N	2025-07-25 08:30:33	2025-07-25 08:30:33	\N
4cd55dcd-37ff-4a89-82f2-11f5ee027b0c	Nathaneila Chyka .P	nathaneila-chyka-p@example.com	\N	$2y$12$0BtJ.zWUf/oSqUcO01kT/.VmTjmbsCHTcdTt3dUVxfvRFzKL0nzMW	\N	2025-07-25 08:30:33	2025-07-25 08:30:33	\N
4b33601a-9582-434b-a989-416ad5bf0ea6	Maryam Aghniya .H	maryam-aghniya-h@example.com	\N	$2y$12$GwB0hpMkRtdi6GYDqrLKU.XD4CkVk.FJ0.1Zku3nBVO21HIE7B0Em	\N	2025-07-25 08:30:33	2025-07-25 08:30:33	\N
ce20e0fd-1f85-41a6-9072-cb635c04b8ed	Javas Bimo Anagie	javas-bimo-anagie@example.com	\N	$2y$12$GBTNvl9k97LRzM3njLsZwuCAS6sT/kqgSVwrRw2e3cUp60vapkXva	\N	2025-07-25 08:30:34	2025-07-25 08:30:34	\N
7f42eb4e-bc20-47ad-898f-877a53c6fe8b	Aisyah Dwi Wijaya	aisyah-dwi-wijaya@example.com	\N	$2y$12$Rp2zRCkbw6fjwfXOdocC4.FkjGAL9fbQMN7rFN04Q.5ojViHvMMqm	\N	2025-07-25 08:30:34	2025-07-25 08:30:34	\N
12e993c7-7730-4e43-a3ac-ae1f469ee578	Athaya Rasqa Yosicha	athaya-rasqa-yosicha@example.com	\N	$2y$12$5MXjQn.NbQ9N4A.235OU/.OcCmPnuwttFNcJhJ9kqH2nb8oKRE7FK	\N	2025-07-25 08:30:34	2025-07-25 08:30:34	\N
3aa5aaa6-ee32-4885-bd38-6a7e01d763a8	Binti Himatun Aliyah	binti-himatun-aliyah@example.com	\N	$2y$12$o17rulVGSVoCq5HFAuWTxOQhHVTEbOAxXxPRGvYmH4.zxmeDZbRk.	\N	2025-07-25 08:30:34	2025-07-25 08:30:34	\N
5ca41eac-4b6c-429a-a58b-f5f4e140e212	Gendis Kahyang Ayu	gendis-kahyang-ayu@example.com	\N	$2y$12$PKpMIrIRyueaUKGOTx653Opi.56qIow0Gq3tsh.5zH0dLbjqX/Nvu	\N	2025-07-25 08:30:34	2025-07-25 08:30:34	\N
ded7b757-e9f2-45b8-84b1-086c72061382	Adeeva Afsheen Myesha Gayatri	adeeva-afsheen-myesha-gayatri@example.com	\N	$2y$12$jUJCeMK2F9vbo6UotoQeI.7MnAocw8DFyWuvr/81xJvRmKRD/P0eS	\N	2025-07-25 08:30:35	2025-07-25 08:30:35	\N
fb253ba0-9418-47f0-a15b-9934bb51ae32	M Syihabuddin Arif	m-syihabuddin-arif@example.com	\N	$2y$12$DpqBo4DfyijoOUAr.pXvKO8RjeCslASS3tofpcQR6u2kts41AclRa	\N	2025-07-25 08:30:35	2025-07-25 08:30:35	\N
0620a6b0-f617-4230-a1ad-5ff7cffe69dd	Arafa Nafisah	arafa-nafisah@example.com	\N	$2y$12$JsimNDD.qUd98puP.DGZjO2fQpWrh8JFw5MbdYHZuLoeEDpL3gVH2	\N	2025-07-25 08:30:35	2025-07-25 08:30:35	\N
1a901480-b084-4bcb-bd3a-0241f13600a6	Addeeva Azalea Heriyanto	addeeva-azalea-heriyanto@example.com	\N	$2y$12$6t0fenUD/HYSH29watxZl.CLbcoJ2i.UShiR0/U0UWK1P8LyeiCXa	\N	2025-07-25 08:30:35	2025-07-25 08:30:35	\N
f39abbae-8672-4595-b8e4-04e73caaa13d	Evelyn Ivanna Athalia	evelyn-ivanna-athalia@example.com	\N	$2y$12$h8cm8DlRnl4JNbRbV8d4l.NwAfvaxZa1.XHoyaMbKVYPR..A/uRLO	\N	2025-07-25 08:30:36	2025-07-25 08:30:36	\N
a3e17e74-da11-43cc-be2c-e8405f646532	Rizky Ananda Okta	rizky-ananda-okta@example.com	\N	$2y$12$wmqBg3z4A195eFpeGfw0k.EOL8WbaqCtuyx7AlCrNNWmzEE4rSv2K	\N	2025-07-25 08:30:36	2025-07-25 08:30:36	\N
ebe859dd-6d56-4caf-bbf9-fc04ff94910d	Handika Dwi Ramadhani	handika-dwi-ramadhani@example.com	\N	$2y$12$JlCQSekjZHdH40Xu29zRVO0ejBaTu2vgkwREiOcBnqsMQLDtZbYt2	\N	2025-07-25 08:30:36	2025-07-25 08:30:36	\N
af25ac7f-951b-41ce-8d35-98df9284d6c8	Aurelino Andres Nizar Alfarizi	aurelino-andres-nizar-alfarizi@example.com	\N	$2y$12$zSPbu1Sv.wg6UrIrKz8zOOdr0umtgJvYsFHMlWM99HJ1GB0JbmVy2	\N	2025-07-25 08:30:36	2025-07-25 08:30:36	\N
27ef3646-4300-43bd-83f6-a99867881fa9	Ata Bina Almazier Muhammad	ata-bina-almazier-muhammad@example.com	\N	$2y$12$cPfNsvm6xiFsDPRgDlrj7.3TVfwarn7Ygj3hhYUI6.hPfc2j7FQO2	\N	2025-07-25 08:30:36	2025-07-25 08:30:36	\N
c63eca29-08e8-417e-8851-9fbdb5bf1c58	Alnamira Azqiara Yumna	alnamira-azqiara-yumna@example.com	\N	$2y$12$jiMecWRN6kJ640mREAxtv.c39jo7d3P7KP.Lca/UURny1qespHsgq	\N	2025-07-25 08:30:37	2025-07-25 08:30:37	\N
005466a2-2d8d-46f3-9d9b-2a59b2b1e71d	Mike Afdhalia Maharani	mike-afdhalia-maharani@example.com	\N	$2y$12$lfSH5Ce4m.GHJaRTl8PqIuMHRfDeIDAvU13Qvb.a6AGMAQVhz1Ee6	\N	2025-07-25 08:30:37	2025-07-25 08:30:37	\N
1ae9173b-bede-4063-bbc3-33106beab976	Erza Faiq Roziki	erza-faiq-roziki@example.com	\N	$2y$12$R8FW4F68uC.Jc4ftskEJbOCiVhAm6fylL89NRMSom2ffXNS35Yiga	\N	2025-07-25 08:30:37	2025-07-25 08:30:37	\N
5c9a9eea-c8cb-45d5-b161-a1d10c83e500	Jasmine Adi Rania	jasmine-adi-rania@example.com	\N	$2y$12$sQsEqu56j4mW6IOPlLXa1u7UOHeohbnf0w81Z.iQAW9Ee71vTP7hS	\N	2025-07-25 08:30:37	2025-07-25 08:30:37	\N
f84ace03-8331-4b8b-a023-dd43ff8d0770	Nuraisha Azni Hania	nuraisha-azni-hania@example.com	\N	$2y$12$Yy9v4fRjZLByooctBa4zcuMJ5OAcWbBSbi/9AAjUjeYVALplMTgw2	\N	2025-07-25 08:30:38	2025-07-25 08:30:38	\N
9cde7b9c-3d9c-42ae-87c3-8ad3ba74c0bd	Azzam Khalfani Arkananta Laksono	azzam-khalfani-arkananta-laksono@example.com	\N	$2y$12$g95TqiGRAFkOXhmtBr/jSOkTF7cuFKfp8I4dKYAUESJXoMWFQ8Goe	\N	2025-07-25 08:30:38	2025-07-25 08:30:38	\N
ff1785fd-a042-4070-be2a-34654b9397a1	Fariza Aulia Azzahra Ningtiyas	fariza-aulia-azzahra-ningtiyas@example.com	\N	$2y$12$M8GiRKMhHOpqwYK3DkWD3.Z0cbrnZCv3zZxlgcHwn8TXCEmVLRtY.	\N	2025-07-25 08:30:38	2025-07-25 08:30:38	\N
a520d7cb-6dd3-47c4-b498-b621dd389250	Ahmad Rafasya Ahla Illiya	ahmad-rafasya-ahla-illiya@example.com	\N	$2y$12$I2aY2uJynKkan7zneKVhfO9RlCABaXEi4HmXCaC9ID0G0FP50.r1i	\N	2025-07-25 08:30:38	2025-07-25 08:30:38	\N
7e9ca9fa-2339-4f5b-ad25-02398c9381d5	Azzahra Ainunnaya	azzahra-ainunnaya@example.com	\N	$2y$12$5ThNWWbnSpC0gg4VOAkPJOun4XjltNsVDxEGk5UDeKXmAqsiID/mG	\N	2025-07-25 08:30:38	2025-07-25 08:30:38	\N
7ca8900c-e3fa-4ed6-8f2f-a4c7e58bdc57	Aysqa Fawazahra Hanum Prayudian	aysqa-fawazahra-hanum-prayudian@example.com	\N	$2y$12$BQzHp1h9Zl3ng7WnAf.efuvDEMfxL7GD1lsH4o519uGn6VneEEroy	\N	2025-07-25 08:30:39	2025-07-25 08:30:39	\N
67da2ef9-0b42-45d0-a04b-79affcfb01ba	Alfandy Rifqy Mumtaaz	alfandy-rifqy-mumtaaz@example.com	\N	$2y$12$2FbZYzqpnessmFLmVhzSoeys1uUYUECjVYOgDoUp9Y/hrIb24c3Ji	\N	2025-07-25 08:30:39	2025-07-25 08:30:39	\N
1f98434c-d0e4-4c49-aba1-1b37d9dd79a2	Ariqa Bilqis Sauqiya	ariqa-bilqis-sauqiya@example.com	\N	$2y$12$pQXAJZHRiZ8l6CUw/OCEFudaiOLlg1cg.k8.IpWrP98FsrllnRe36	\N	2025-07-25 08:30:39	2025-07-25 08:30:39	\N
4c958c4e-cbcd-4069-baa8-d0350109bee9	Ghania Azkayra	ghania-azkayra@example.com	\N	$2y$12$JatyBuaZw1AfRZpFwQWa1OIX1T8N8MNlgBh.PL7wd9RZLMliq/DV6	\N	2025-07-25 08:30:39	2025-07-25 08:30:39	\N
c7d27ecf-882e-44b3-a32b-8a4e79e21187	Azka Aqilla Farzana Putri	azka-aqilla-farzana-putri@example.com	\N	$2y$12$5Z71dcPW7GUp.oH2S4b.XeK0GhKfN0w6tegVPHO6BLHbwQkjk9XBa	\N	2025-07-25 08:30:40	2025-07-25 08:30:40	\N
fd341192-2c32-4e5c-974c-51c52c024d4c	Al Khanza Ainuha Kusyadi	al-khanza-ainuha-kusyadi@example.com	\N	$2y$12$iADgU13dMB.A8Gtpt2BeguD0HrGfLs1iVc80Ohras0TR3OhBF5jva	\N	2025-07-25 08:30:40	2025-07-25 08:30:40	\N
eb04a4b8-d731-4a74-ba73-3a146b534803	Al Khenzi Attahillah Kusyadi	al-khenzi-attahillah-kusyadi@example.com	\N	$2y$12$up0cRDc05pWdaFTLQOW95u5OHGVstfN7LSBbv20BtnYQg3P/./VzW	\N	2025-07-25 08:30:40	2025-07-25 08:30:40	\N
3d40930b-9b0d-4d68-a54f-a4bf93dfae18	Naifah Zahrana Khoiriyah	naifah-zahrana-khoiriyah@example.com	\N	$2y$12$vzxCrbvwplEvAEXONKaePO0CLoCxLLmxNPZt0Px/nAfNwNhaGifwm	\N	2025-07-25 08:30:40	2025-07-25 08:30:40	\N
977a05b7-59ba-4847-83ac-cc5e468403f6	Labib Ahmad Al Faruq	labib-ahmad-al-faruq@example.com	\N	$2y$12$R6kYyqsjKJvCynPGQNNbIOYaxeIBHT4miw.bew5yicWp4FA7DBQ0.	\N	2025-07-25 08:30:40	2025-07-25 08:30:40	\N
ab38727c-7374-47e8-a50e-107f18316d48	Arla Alifa Farhana	arla-alifa-farhana@example.com	\N	$2y$12$yD9UPi9coyGdabRMzuKdUO635qxBzSatsdhqZ60s1sWOv.rxNboJq	\N	2025-07-25 08:30:41	2025-07-25 08:30:41	\N
57e573ee-71cd-4799-ba37-3a80596006e7	Devano Baihaqi Susanto	devano-baihaqi-susanto@example.com	\N	$2y$12$yzcx9gRKkDzkYxSNbYzrHeNUiydRQgMfDHptbJlQLYTT83tK/Otpm	\N	2025-07-25 08:30:41	2025-07-25 08:30:41	\N
348b7228-b43e-4b4a-aec9-ca7281bde1ee	Jasen Rafa Alfariel	jasen-rafa-alfariel@example.com	\N	$2y$12$yFZBC1lwSyGeawo9xXjXw.x/nn/AMqTQT5l1hbsQp.MTnDHNoegdm	\N	2025-07-25 08:30:41	2025-07-25 08:30:41	\N
54440776-0c24-4044-b1f0-cc8a2c2a88b2	M Doris Nur Alifi	m-doris-nur-alifi@example.com	\N	$2y$12$xWfJxPsAaemI1OvaWIZS5u2I3cD75kwPv0qW5jb8dvaZnEhW3b43q	\N	2025-07-25 08:30:41	2025-07-25 08:30:41	\N
7f58194c-0a5b-4174-8af3-efda63513eef	Nugraha Khairul Abada	nugraha-khairul-abada@example.com	\N	$2y$12$kVaDy1XyJSx7hvQGON.zVu7TzT8zDNg5A6zR9IhdABYE8UjIxtmzG	\N	2025-07-25 08:30:42	2025-07-25 08:30:42	\N
27b86d2a-24d1-4353-86c3-08e774cb399e	Gilang Firyana	gilang-firyana@example.com	\N	$2y$12$FFeo6lmHxfkHHXH8e1NjHOH.tgbmdJN6nOmADtjZMzCwumKkrQ5Hq	\N	2025-07-25 08:30:42	2025-07-25 08:30:42	\N
e2798648-2a69-4240-b5a3-287b3bbd0dfa	Dzaky Gibran Alfaris	dzaky-gibran-alfaris@example.com	\N	$2y$12$8SjHdOSujBc3DwPM91ll.eG8eNIRmizLfAJTewDe8IWPctL6JDdAq	\N	2025-07-25 08:30:42	2025-07-25 08:30:42	\N
65dfc511-19fd-4369-8921-f935474e965a	M Hilmi Wafi Maulana	m-hilmi-wafi-maulana@example.com	\N	$2y$12$AZiEIUryAabEj9UuP9ZeDeIWRZVeU/485CsPHaIdoQBOEtWxlFZl6	\N	2025-07-25 08:30:42	2025-07-25 08:30:42	\N
3effc50d-fd98-45ef-b276-1eae3413a018	Hanifa Septi Arista	hanifa-septi-arista@example.com	\N	$2y$12$LDxvAZh0LpcpDQk3TGqfNuLra4ZLP59IAWT9pLdLcnV8XHQebQPsC	\N	2025-07-25 08:30:42	2025-07-25 08:30:42	\N
1764a941-edec-4afd-be5e-af84586ae0ca	Diyandra Alessa Priyanto	diyandra-alessa-priyanto@example.com	\N	$2y$12$LphRV6AqSnAhL1Z/GCOD7OwSuMaGtg8WRvyxGvUm6cwj56ryvtxeO	\N	2025-07-25 08:30:43	2025-07-25 08:30:43	\N
1dd2d595-22a4-4e56-b210-c3176856142e	Raihana Emiliyana Tiffany	raihana-emiliyana-tiffany@example.com	\N	$2y$12$J4ydsDWdbmXt1TRSt4XYlezr46gJmQjF696akUHb/YxX2CTjLbuPi	\N	2025-07-25 08:30:43	2025-07-25 08:30:43	\N
7ac1a07a-62d4-4c0b-927d-68624fc8cb4b	Andita Kanaya Cahaya Putri	andita-kanaya-cahaya-putri@example.com	\N	$2y$12$.WAEV8U9pXV3haB2JlWxJeyP8.uKCIG3CHQ.ny3Pp0D9IRln1GPA6	\N	2025-07-25 08:30:43	2025-07-25 08:30:43	\N
7e7441a6-6d88-4873-bef7-69db88b9507b	Bintang Satriyo Pinilih	bintang-satriyo-pinilih@example.com	\N	$2y$12$nGmVgu0TLFzqtkNmc8Wc3uQ57l8othkrIJ40GA5nMyRdWJOXylMBO	\N	2025-07-25 08:30:43	2025-07-25 08:30:43	\N
aeba7bb4-799b-49e0-a71e-f25a81e71464	Alex Ahmad Robith Fahimy	alex-ahmad-robith-fahimy@example.com	\N	$2y$12$wlnjkQQysvO8JBRX3I1DGe2CKFRAyEeLfWC86UbsYsTz2I2dAupYW	\N	2025-07-25 08:30:44	2025-07-25 08:30:44	\N
f99370da-97f5-47ac-9049-ac4cb11bf02e	Ratu Putri Maratus Solikah	ratu-putri-maratus-solikah@example.com	\N	$2y$12$NaCDR5JYW392V/lCyNVs5uIzj5N5qgeLbl/zGEvOhqKaHGghpfCHC	\N	2025-07-25 08:30:44	2025-07-25 08:30:44	\N
c5a609e6-6829-443b-97e4-7c3b5447c7d6	Khansa Mahira Kamil	khansa-mahira-kamil@example.com	\N	$2y$12$LviKyUnLLeCOtVlgg1va1epyi0yDr1TY7bn/hojXcMoMBUvawxXUC	\N	2025-07-25 08:30:44	2025-07-25 08:30:44	\N
dfd8d86c-a90a-42ff-9198-8f4a7e86363d	Fayyadh Labib Hizbulloh	fayyadh-labib-hizbulloh@example.com	\N	$2y$12$He2yMrC98/0LIlUTpKtlVe/.9POKdZIEpWH8Hqia3mJ9fzD7PxeiW	\N	2025-07-25 08:30:44	2025-07-25 08:30:44	\N
70922a13-a3eb-4e28-aa1d-f12e576529be	Faiza Eka Indrayanti	faiza-eka-indrayanti@example.com	\N	$2y$12$SGKIqd9z8b/gY2wAcr24uOs8F58qMrCAXDyIp5bDWpxy9UZEPNWWK	\N	2025-07-25 08:30:44	2025-07-25 08:30:44	\N
5632c5cf-ac75-4786-a111-59a68f007a92	Sihan Ziyana Rohmat	sihan-ziyana-rohmat@example.com	\N	$2y$12$DggSf/qR3zpe4J7Ys9NowewNYY5fmDbkhFqkV3y5Y5n9tRwcKzQL6	\N	2025-07-25 08:30:45	2025-07-25 08:30:45	\N
493c20fc-ef4e-4045-8245-f173f990a34e	Azka Faeyza Subowo Putra	azka-faeyza-subowo-putra@example.com	\N	$2y$12$/VS28zuT.qNUQqZnva/7Uu/6QSNLBjfHT2aT4Md4rSas5Tw5030Lm	\N	2025-07-25 08:30:45	2025-07-25 08:30:45	\N
3ca88945-d338-4710-b38e-8f29c6f673fd	Alena Dzifara Rustin	alena-dzifara-rustin@example.com	\N	$2y$12$OcryaReYkntEnzQFoGOzA.cmocgrYsnHnj2/Ea5zIdSIWa3bwwmAm	\N	2025-07-25 08:30:45	2025-07-25 08:30:45	\N
d2c457bd-66c6-4d00-8416-56c7545501e7	Priya Arsenio Surya P.	priya-arsenio-surya-p@example.com	\N	$2y$12$0e44iwnL6bOMMsjszPmJJO/jSPLkDYHhz8GLUV2l4/b9P3WrtcQ2y	\N	2025-07-25 08:30:45	2025-07-25 08:30:45	\N
90bdfcfc-b9d9-4b9c-8869-d4d497d8e910	Ihsanudin Rahmad	ihsanudin-rahmad@example.com	\N	$2y$12$7EeBV/wx3BrIxL0uof9FkeCkSFsQUZT/KcE959DhfJf34TtJlE5du	\N	2025-07-25 08:30:46	2025-07-25 08:30:46	\N
f322a072-cdb1-47d2-86a0-5d703dc0a8d2	Senja Reshmania Ahmada	senja-reshmania-ahmada@example.com	\N	$2y$12$gZayc7UvE4rbR5CyfJ2wMOgnjmq0H3ZdJbqd7/sLZt0GOW8DhaMFO	\N	2025-07-25 08:30:46	2025-07-25 08:30:46	\N
32ec375b-e199-4b5b-beaf-f28e3b3f056f	M. Azka Raffasya	m-azka-raffasya@example.com	\N	$2y$12$P7/cP5tVe0cAuomQ3V7Id.v6NG37qvSSO2guEc9V.zA1ikb6gw8aW	\N	2025-07-25 08:30:46	2025-07-25 08:30:46	\N
66398265-bfce-468c-93c0-cb09b1bd7dd6	Elmira Qinara Irawan	elmira-qinara-irawan@example.com	\N	$2y$12$VNpyreuE8gOmE7fG.KdnlezojkBz1rTBmlie4/vDHh43gyesOYpem	\N	2025-07-25 08:30:46	2025-07-25 08:30:46	\N
4f20e398-2968-42e7-86e5-3094b6c621d4	Muhammad Athalla Rafan A.	muhammad-athalla-rafan-a@example.com	\N	$2y$12$oApYMboEqAaeroLyvF.zNO9qTZAN1q/RAXfVs8HJCVBQaAcJE5VRK	\N	2025-07-25 08:30:46	2025-07-25 08:30:46	\N
5f33e2e5-87a9-4e02-995c-4d9fbed4768d	Muhammad Athar Rafan A.	muhammad-athar-rafan-a@example.com	\N	$2y$12$5NiprUxf9qgBMU.Gt8SWuunbRicKEtLr6Ntj9CzgMCNSgJE452A5G	\N	2025-07-25 08:30:47	2025-07-25 08:30:47	\N
458ec24a-c14a-47ac-b66d-f3b67ac5f02d	Gavino Putra Dharka	gavino-putra-dharka@example.com	\N	$2y$12$zA2xBISxUOKHyhRaAhjc1uslhVq/WxAMzNQAcj2..0xvFllPoINJe	\N	2025-07-25 08:30:47	2025-07-25 08:30:47	\N
a79aa3f6-5413-4255-9fc3-8152cb66647c	Gending Asmarakanthi N.	gending-asmarakanthi-n@example.com	\N	$2y$12$7hcnAzdVEvpaOkO4zzqqPOUy1sQwQrizh7h22IeE99ADzSps7yUHy	\N	2025-07-25 08:30:47	2025-07-25 08:30:47	\N
6ebfb0d7-3e38-4428-bf6a-3f5623c1fef0	Firda Azzahra Callista Putri	firda-azzahra-callista-putri@example.com	\N	$2y$12$r2MVYm9t4dfQXSMfWENU2../Zg7VphlVD9uEdyEkUnZxpIoKIDnG6	\N	2025-07-25 08:30:47	2025-07-25 08:30:47	\N
21c923ed-a5c3-461c-9ef3-8b6030f69741	Afiqa Naurahasti Utomo	afiqa-naurahasti-utomo@example.com	\N	$2y$12$vLehdPJ2Im8KN.knjVrqruNcVpAMlOD4AiRjbVVBa3.a8X2b0IQ/W	\N	2025-07-25 08:30:48	2025-07-25 08:30:48	\N
6721ca00-5f8a-4273-8ed6-2410e69209d0	Adifa Ashalina Estiawan	adifa-ashalina-estiawan@example.com	\N	$2y$12$E0E1L3d5rN27qOPRz06Vu.AGbyw.Bo/aHLz64d/5oE0wiSakxCtzW	\N	2025-07-25 08:30:48	2025-07-25 08:30:48	\N
a1e323ff-e29a-41e9-bdcf-90de2aecfe19	M. Fillio Arsya Farzana	m-fillio-arsya-farzana@example.com	\N	$2y$12$rucgV3IRm0yYkmDdf4xPzeD6zQYfpC9Qec6K4jUnkKh4WmeUBxwjy	\N	2025-07-25 08:30:48	2025-07-25 08:30:48	\N
d5c6a16c-0260-4cc9-a8bb-e83a0787eed9	M. Iqbal Maulana	m-iqbal-maulana@example.com	\N	$2y$12$ajlWmlmoq86YIXoB.hlDUuO9RAIgv0N4ukWLAd1i8f90veWX7oXoG	\N	2025-07-25 08:30:48	2025-07-25 08:30:48	\N
557f079b-858a-4b67-bd0b-d0eb3784ba9e	Meysha Nafeeza Ofella	meysha-nafeeza-ofella@example.com	\N	$2y$12$EHxbO8v8n/X6yQ5HQT4EFu.1WHyhzk9zeZ2wNdDlX7lonDZmsY8bu	\N	2025-07-25 08:30:48	2025-07-25 08:30:48	\N
bc907d78-0dcb-40ec-8adb-c97756dafba9	Muhamad Alfin Faiz R.	muhamad-alfin-faiz-r@example.com	\N	$2y$12$i9IFUfJS0wDB5jADUwahcOiElLab1nzcZi3pdz3sE8hNJDTVwvTHS	\N	2025-07-25 08:30:49	2025-07-25 08:30:49	\N
6fb811fd-24cc-4153-a20e-5f55d0e39892	Shaquille Arkhan Rosyadi	shaquille-arkhan-rosyadi@example.com	\N	$2y$12$2EP8FPriwCLLXD6.C.qcZ.Pk6pnGXPtSHUnnjElLyDbPO/gTDR5IW	\N	2025-07-25 08:30:49	2025-07-25 08:30:49	\N
8f708791-4ecc-4f54-8db8-5125fe84e5c0	M. Wildan alfatih	m-wildan-alfatih@example.com	\N	$2y$12$rz5DqMaGzOksJQFVEDgVqOu/mUSQeKeejNplipDcTulG6V3wcqRFW	\N	2025-07-25 08:30:49	2025-07-25 08:30:49	\N
3a88ba38-987e-42d1-815a-4658063701d4	Ahmad Tabrani Rafandra Said	ahmad-tabrani-rafandra-said@example.com	\N	$2y$12$eyLkkBCzdR1kujyR56Jt/OnTi4mo4g9q6U5llQRzB0KXQXoPj9D2W	\N	2025-07-25 08:30:49	2025-07-25 08:30:49	\N
efe5a0a4-8678-4d24-ac31-00fe959c28f5	Ahmad Abror Akbar	ahmad-abror-akbar@example.com	\N	$2y$12$AgpQFURpYGEQAl68K61d4OYKMAzd7lmWP8ndZQttYja/UZeYk9Yo.	\N	2025-07-25 08:30:50	2025-07-25 08:30:50	\N
8af5a754-6ed3-4c76-b2dc-b0a148e64c4c	Rasyiqul Abid Aqila	rasyiqul-abid-aqila@example.com	\N	$2y$12$iR15sFkute41C4fqByvASOLsWaTQjoKWY5t3XaYMA3cpMtspefGdy	\N	2025-07-25 08:30:50	2025-07-25 08:30:50	\N
8355bf88-12fd-4eeb-816f-5a6fccf6851e	M. Alfaatih aden	m-alfaatih-aden@example.com	\N	$2y$12$h7mtJVJu.clmBtZ0QEmRAOj0Z80NBKGkKmQpbktiKieQEOQXPtXmG	\N	2025-07-25 08:30:50	2025-07-25 08:30:50	\N
d7af5d9b-4b6a-4a9a-ac7f-d02f57e12d7a	M. Fathan Narendra	m-fathan-narendra@example.com	\N	$2y$12$UhRaxOoEIHlqndt1qbcbYeImV7q4kGx5l1PuMw7EZJbRVY96sqVoa	\N	2025-07-25 08:30:50	2025-07-25 08:30:50	\N
d7ccf84d-cff2-4b92-b691-d1a5a8ece4b5	M. Rasya Zafran Abdillah	m-rasya-zafran-abdillah@example.com	\N	$2y$12$h4uPVDcifweSDBzGzv0/mO.Sh4OZck6.P8GmUR5BMj3QpY3N8UQ42	\N	2025-07-25 08:30:50	2025-07-25 08:30:50	\N
32fbd37a-f456-462e-b314-24a37c36e232	M. Rafie Faishal Munir	m-rafie-faishal-munir@example.com	\N	$2y$12$KO303atWR9ulgdqVsukkxO/xlKV.sbMAl1q4zmrc1tKtVsyqQDK1G	\N	2025-07-25 08:30:51	2025-07-25 08:30:51	\N
5aa21095-476d-4382-8876-8ea1bc1dceb3	Diajeng Azkiya Al-sandi	diajeng-azkiya-al-sandi@example.com	\N	$2y$12$0GMkVIThHetajbiX8lPLMOvlwO3gCESfVuJiy.KpGy6gBr8EEf116	\N	2025-07-25 08:30:51	2025-07-25 08:30:51	\N
c26d4d07-1610-4994-9c60-4a6318fb1897	Nauval Akbar Pratama	nauval-akbar-pratama@example.com	\N	$2y$12$xMy0gwKSL40MhtQO5OUkTeJj1g2muXy/dd/HkKrRjk5J/r51ZV3B6	\N	2025-07-25 08:30:51	2025-07-25 08:30:51	\N
8907caa8-0e3e-4382-8b5e-21cccffc9e96	Kaivan Rahardika Rahman	kaivan-rahardika-rahman@example.com	\N	$2y$12$c9dJRTeDut89z63bD02Gz.kTLpJKnsMy1fhIK3Qx5IZKskRxMFo.S	\N	2025-07-25 08:30:51	2025-07-25 08:30:51	\N
90e58ccf-bda1-4c0f-8e32-1c2216020881	Okta Alfarizqy Khairan S.	okta-alfarizqy-khairan-s@example.com	\N	$2y$12$LoLQZGUqf91LOhadNb.DKulFiWPOtMnUXxkpLN/OB5gA1tpFftHIC	\N	2025-07-25 08:30:52	2025-07-25 08:30:52	\N
68532177-0514-4977-847c-5f6db5e4bdea	Nafla Syauqiyya kamila N.	nafla-syauqiyya-kamila-n@example.com	\N	$2y$12$yZAsnc5tsKzPjyPQQZVIseE8OQEZiKuI/UshJ.OK.tOWD5KW/zsMO	\N	2025-07-25 08:30:52	2025-07-25 08:30:52	\N
8cfa28c6-8236-4bf4-b715-45cf56ba5846	M. Alvis Haziq AlZam-Zamy	m-alvis-haziq-alzam-zamy@example.com	\N	$2y$12$4r0IUdN/KWN.FoltBnOmWugTJhbR9OeGCM.2Bbj1A8RyFdA17EuHW	\N	2025-07-25 08:30:52	2025-07-25 08:30:52	\N
571f8cb3-47b1-4061-94ee-b4f15c27d248	Nabila Adira Azzahra	nabila-adira-azzahra@example.com	\N	$2y$12$iXqQK4UV7S8YyXNZYOe.h.aU1AvW0jIqu5ocRsV2W0BkDfGLne9y6	\N	2025-07-25 08:30:52	2025-07-25 08:30:52	\N
7a78cde4-e274-45e1-b9a4-bce827de9e94	Aldo Brahmantio Saputra	aldo-brahmantio-saputra@example.com	\N	$2y$12$rWco0DXYxmeG9y.vanT4oumD0ZzBuCWXmwslPbsTk03Fes98Ynwki	\N	2025-07-25 08:30:52	2025-07-25 08:30:52	\N
96145b14-9824-4c8d-97b0-0a5cb17a81b0	Syafania Azzahra	syafania-azzahra@example.com	\N	$2y$12$NZyr7gpAcLLkmY7I00vx7OnMKm8aICkAUbl.1EqnVPNvCPC.7EuVu	\N	2025-07-25 08:30:53	2025-07-25 08:30:53	\N
1ec3d6c3-8af6-475d-8355-a9f9459dacd5	Kanya Fernanda Nauren A.	kanya-fernanda-nauren-a@example.com	\N	$2y$12$hqbjJTNpi132hrEtntf4OOILnsJwP5gaGkhghpfEqIvOerIQEs92C	\N	2025-07-25 08:30:53	2025-07-25 08:30:53	\N
85a2943b-5c02-4370-bf40-f669827ff5bc	M. Ghaza Al Ghazali	m-ghaza-al-ghazali@example.com	\N	$2y$12$hwpQY0iX18xkh5s8EtT3J.Ps1w1cVjbWI1zmWyVooaXS5AQ.4lN26	\N	2025-07-25 08:30:53	2025-07-25 08:30:53	\N
8d232ca2-b612-4493-bde2-eaa57d9e722e	Muhammad Arfan Rulli Ardhana	muhammad-arfan-rulli-ardhana@example.com	\N	$2y$12$TrbYI8wKNCGWtQryeWQmt.Fs19fmOGECoxBdgqyxexlI15gUxnM52	\N	2025-07-25 08:30:53	2025-07-25 08:30:53	\N
a803da1c-3a00-4f2a-b153-df86af179c83	Ahmad Raditya Maulana	ahmad-raditya-maulana@example.com	\N	$2y$12$6x4dhnsmAHINHKMunkHd.e2FyR/GXjqWp87xJGNh5I/80.F7YsRGi	\N	2025-07-25 08:30:54	2025-07-25 08:30:54	\N
c32ef7e8-b0ab-4ca4-90cd-543a28f0dfee	Heraco Faqih Al-Zahid	heraco-faqih-al-zahid@example.com	\N	$2y$12$kMdYn3EXLIqhhIB6TF54Me3wrcLY/Ug2NkXyo6me.yPqO01LvKgxS	\N	2025-07-25 08:30:54	2025-07-25 08:30:54	\N
08c28cbd-c83f-4f66-bf8f-39bad180c66d	Albertus isnugroho	albertus-isnugroho@example.com	\N	$2y$12$rLt4hosO9z5fMQzxcQzFIe2HWAc1fGeDJB4Cu/jo3B8nQogZerf/O	\N	2025-07-25 08:30:54	2025-07-25 08:30:54	\N
63cee5ee-5cb6-4d78-8a2f-c59cde60ebf4	Azalia Syifa Alina	azalia-syifa-alina@example.com	\N	$2y$12$.GgD3XHiXTu17XzkaYTb5uP.VA8gos.DAK6hgkTJibLEl7XeC1c6y	\N	2025-07-25 08:30:54	2025-07-25 08:30:54	\N
9697b635-226a-4556-8021-63b3b4ee86f9	Arsyilla Naladhipa A.F	arsyilla-naladhipa-af@example.com	\N	$2y$12$Ss16bhKk9g6GV7FcDoH5KeqqFzUiJiGe2yrVzrONMZlNqGr1POn1W	\N	2025-07-25 08:30:54	2025-07-25 08:30:54	\N
5e4503f1-974e-4771-9615-3db8a1626b32	Kirana Aqila Zahra	kirana-aqila-zahra@example.com	\N	$2y$12$lpt/VWYsvvQdlkEVHOIg/ODaZcCgK9CB94HULEayo9.fC/76mpPE2	\N	2025-07-25 08:30:55	2025-07-25 08:30:55	\N
db4b86da-4383-4a6d-9b2f-c8c316a8c8cf	Alya Maychara Putri Widani	alya-maychara-putri-widani@example.com	\N	$2y$12$buCsyzBxfLm6NTwKoUBQ2.ICquxV7Xug4fewPVr0sU/m7t6aTIrBu	\N	2025-07-25 08:30:55	2025-07-25 08:30:55	\N
80f5466f-4881-4790-9e99-fbfa732f3c6a	Edisty Indana Lazulfa	edisty-indana-lazulfa@example.com	\N	$2y$12$G/DRTwpZvTT783K9wP1icOrl8ijLeCfkt3SYtY7R8ffZrylPSBC/W	\N	2025-07-25 08:30:55	2025-07-25 08:30:55	\N
046c5a8d-fc93-49b6-85b7-ad4c556e2079	Alhindun Rizki Khumaira	alhindun-rizki-khumaira@example.com	\N	$2y$12$OTqpadfXa2G8KeVZ.d8PWONYEKOIG7iILxZC/isNqOGWK9NdL51zi	\N	2025-07-25 08:30:55	2025-07-25 08:30:55	\N
2f5d72b1-1528-4540-8855-09a9d73367fd	Alifia Farzana Navisha	alifia-farzana-navisha@example.com	\N	$2y$12$6YpchjWNBZzPqLmhi5JdZezu/yqJeq.MiX0aRcfUKcRWKVDkFJZ/e	\N	2025-07-25 08:30:56	2025-07-25 08:30:56	\N
8fa85f9b-7e3a-41af-8d63-66d2f006fab8	Alvin Selin Al Madani	alvin-selin-al-madani@example.com	\N	$2y$12$1fd6sc0Pvdc.6LclnT5YkuhXRm8d93mxkC9mQE732my29ZzbKkhRG	\N	2025-07-25 08:30:56	2025-07-25 08:30:56	\N
ddf415c9-9f00-4cdb-a8a3-433cd698ad51	Ahmad Nur Rafiq	ahmad-nur-rafiq@example.com	\N	$2y$12$Mn5j5zy5s3QEyTBF2dCvpepoAL6lpKzelA6FsALKsXFljhl96Gm9K	\N	2025-07-25 08:30:56	2025-07-25 08:30:56	\N
77952ab3-d60e-440a-9347-a61befc18ea1	Ahmad Nur Rafanda	ahmad-nur-rafanda@example.com	\N	$2y$12$4HFgOQ9u8jI6Ir6J3yPeaeYPA8YYXvW94TRY3JASWypwNCRpXJWx2	\N	2025-07-25 08:30:56	2025-07-25 08:30:56	\N
d26360af-9f04-4fed-b8ae-57d2977bb8a7	Baihaqi Suta Dwi Ardana	baihaqi-suta-dwi-ardana@example.com	\N	$2y$12$26er3psw23TzTRT3/T6Vf.HVNvoUTWCg2yJDciRSrbJubiklvA9ZO	\N	2025-07-25 08:30:56	2025-07-25 08:30:56	\N
037f03b0-eb0a-4f21-815a-9e4927b5b6e3	Diandra Syahnaz Pratista	diandra-syahnaz-pratista@example.com	\N	$2y$12$S6FMnqRUr6oBKv0fIdLC7O3nA43Khg7QLhdtmt1v5iE3CdhD7oysu	\N	2025-07-25 08:30:57	2025-07-25 08:30:57	\N
7a3bc4ba-828c-42e5-85d4-ac9d4ed51c03	Abrial Arsakha Virendrano	abrial-arsakha-virendrano@example.com	\N	$2y$12$a7E8mO3qBBPzZ.u0OIwj.en93kYWt46Fs2CEGClTgnmiDwN0w71jG	\N	2025-07-25 08:30:57	2025-07-25 08:30:57	\N
492a5966-6b50-4ec0-9880-ff3ed12e78af	M. Amar Maulana A.	m-amar-maulana-a@example.com	\N	$2y$12$ZccGOKzfDs8OoD6SBm7rSu/q2N4T.cl6gnAVMdeQD5jhunOKgQpMu	\N	2025-07-25 08:30:57	2025-07-25 08:30:57	\N
5cf69106-f352-4748-a1a9-4de1769771f4	Zhaki Muhamad Ataya	zhaki-muhamad-ataya@example.com	\N	$2y$12$iY0kFtOsWKWUgeU0qQmSoe6mN.orWhd5OpnCWStMyELcdgMq20AuG	\N	2025-07-25 08:30:57	2025-07-25 08:30:57	\N
30b4a9b0-573b-4b36-853d-de3466d9a55e	Almira Malika Zahira	almira-malika-zahira@example.com	\N	$2y$12$.Xwc7kuwzpKhFCo9Qfiyg.6Rc5strWSVFCs5LqZNExTRaJCCrBboG	\N	2025-07-25 08:30:58	2025-07-25 08:30:58	\N
a9c089dd-0d0e-4aca-8737-7c490c5fd959	Rizqi Fairuz Hamada	rizqi-fairuz-hamada@example.com	\N	$2y$12$mcOLgHqy7520anbnf3FyN.SU5gR9rbCR/0MXMwiL1xmX3MoNhzZFa	\N	2025-07-25 08:30:58	2025-07-25 08:30:58	\N
5c438de9-15cb-4ff9-864b-70e4b1e9e10f	Marimby Bahari P.R	marimby-bahari-pr@example.com	\N	$2y$12$fiiccjvl5AACp6sJEY5zPes4c8qZWDzkwb.7Cltku1SJvo7U9YIey	\N	2025-07-25 08:30:58	2025-07-25 08:30:58	\N
903999b1-f844-451b-984d-f9f50ef444d1	Cesaria Alifa Zakiya	cesaria-alifa-zakiya@example.com	\N	$2y$12$IbUDmezquZfFNFtojQUJguTerHgNrDhtFbbro.4Ff7iFS7ZLtbXR2	\N	2025-07-25 08:30:58	2025-07-25 08:30:58	\N
8801def7-8d2a-4e68-981d-9d7a707000fa	Abdan Nailun Nabhan	abdan-nailun-nabhan@example.com	\N	$2y$12$QL6jbj9FsGDietF./0Bam.BWZMk5a9UH38yPKSZ348I599uhe52AC	\N	2025-07-25 08:30:58	2025-07-25 08:30:58	\N
f0936b50-f433-40b6-861f-facdfe7da429	Ellen Griselda Irawan	ellen-griselda-irawan@example.com	\N	$2y$12$1wvdxNs5W2lHESGa9HexPe/RIwrZKBUQxwKDDkFzrIKRqJgn4P1dW	\N	2025-07-25 08:30:59	2025-07-25 08:30:59	\N
e8f6772e-70b6-4897-99e1-9c8a65f7d030	Imroatul Hamidah	imroatul-hamidah@example.com	\N	$2y$12$kdC9jlhInxSyklfD0dnJfersTo6Ix5lIqdK//mFbKNGQdr/l5AJsK	\N	2025-07-25 08:30:59	2025-07-25 08:30:59	\N
dd8dac65-6497-4a73-9b0b-be8ff88089f6	Arsakha Ruzain Assauqi	arsakha-ruzain-assauqi@example.com	\N	$2y$12$ANuY.bsNweDV0h2jk7WWL.F05eOMSSHskjoTlaGpw4jWfHwDmnYz2	\N	2025-07-25 08:30:59	2025-07-25 08:30:59	\N
ae96f04c-378f-4ae4-978f-41de05183639	Diyan Zuwan Alifio	diyan-zuwan-alifio@example.com	\N	$2y$12$mBfT4PIN.3UccKw5SWfztOssLpeXCvk8k/Z/ST8X88/0OqUeDDbHq	\N	2025-07-25 08:30:59	2025-07-25 08:30:59	\N
d6749693-3fc4-45fc-bff1-2e3953e6359e	Arijal Alby Nakiba	arijal-alby-nakiba@example.com	\N	$2y$12$qWg/UI7iNj.CC/pwZ1AxHO9RsBQmm9Gp20/E/G12xys980YbNqJ4e	\N	2025-07-25 08:31:00	2025-07-25 08:31:00	\N
a1633acd-48e3-4990-9e21-47e7df6b2590	Ghibran Al-Kahfi Radhutya Yulistian	ghibran-al-kahfi-radhutya-yulistian@example.com	\N	$2y$12$uTIqLznPitu/pxT0gDi6RO/CGAENMu69JnXFipttfzFTpdiX5aZri	\N	2025-07-25 08:31:00	2025-07-25 08:31:00	\N
8c41938a-a597-48b8-bce7-cb8cf6ccb7e0	M. Alfian Nur Adhima	m-alfian-nur-adhima@example.com	\N	$2y$12$YBV4MNspD1/JZn7Gcar5kOdSy9FJilZaP2L3WcJhNjtsIk2IpNl7u	\N	2025-07-25 08:31:00	2025-07-25 08:31:00	\N
316acb0b-3750-4840-949d-a90ebba926be	M. Ni'am Tamama Kafa	m-niam-tamama-kafa@example.com	\N	$2y$12$oj1mlfydg5Gn1fkxHidfS.dkabA1L7nIRK70pG5jKk6GfFSY3slTi	\N	2025-07-25 08:31:00	2025-07-25 08:31:00	\N
e0eeeee2-148d-4572-b1f1-1c04ba5413ac	Intan Aprilia	intan-aprilia@example.com	\N	$2y$12$13MvpOZ0y93XFErmVXzm8OAD2miiCunvUCpp2uwAvnXmPWlHWup7q	\N	2025-07-25 08:31:01	2025-07-25 08:31:01	\N
b27a83de-6113-46b9-8c07-9e72a9916dfb	Aqila Saqueena K.	aqila-saqueena-k@example.com	\N	$2y$12$BeC0O4RBeA7VGg2J/KSWgO/44HIh/oiuin01OlCEO85QL/Zk5ofUW	\N	2025-07-25 08:31:01	2025-07-25 08:31:01	\N
25745489-03b7-49e4-9861-c65ac387adbd	Fatir Nurdiyanto	fatir-nurdiyanto@example.com	\N	$2y$12$gO9tH8ZzQSmuEAQIEak5c.HSPMlZh24tpdriskkf7OKA.q.F5e2nu	\N	2025-07-25 08:31:01	2025-07-25 08:31:01	\N
a5153ca9-c4d3-499a-a965-d0e72e2da22f	Intania Eka Salsabila	intania-eka-salsabila@example.com	\N	$2y$12$WEjnEQTje8hpA6CKp1A0lOKC/YkWhOUSrS4L3E2Cm6V7j3OHwSByK	\N	2025-07-25 08:31:01	2025-07-25 08:31:01	\N
2cf16c02-fa08-4332-a228-5220532b6ce2	Muhammad Alwy Firdaus	muhammad-alwy-firdaus@example.com	\N	$2y$12$5f89RH5dVf57p1NuIZlmh.mIXKldNcTvh9Ktn6lQLcpq75D9LaqbS	\N	2025-07-25 08:31:01	2025-07-25 08:31:01	\N
6a708ca3-6150-427f-b931-f9ad46e0e41d	Salsabila Putri Tifani	salsabila-putri-tifani@example.com	\N	$2y$12$3ZV11QIpRO4vdLoO5tdLweYVwi3EJ6Qh8IP364JFffXqkY54qCFE2	\N	2025-07-25 08:31:02	2025-07-25 08:31:02	\N
14cd5a1b-21d4-4717-b5b0-979684d00b1c	Hasan hanafi Ibrahim	hasan-hanafi-ibrahim@example.com	\N	$2y$12$7SsfbfcWLFKIWJ7FXCLIY.bRNVFpyD.jmGlMh.i2K0oiwcRaLmy1C	\N	2025-07-25 08:31:02	2025-07-25 08:31:02	\N
987732f6-8651-4645-91ee-17492d36ac61	Vania Kanza Auriga A.	vania-kanza-auriga-a@example.com	\N	$2y$12$tb65Z8bCqd4evhxjtCKBa.o78XBR3ksI9RK/vBxSuKs6p2gw0ZON.	\N	2025-07-25 08:31:02	2025-07-25 08:31:02	\N
3b31d4ec-7d30-4718-b1a1-8eda8ffc85d0	Maulida Zahrotul Tazkia	maulida-zahrotul-tazkia@example.com	\N	$2y$12$lSPpg7IdD2eqM3IR7mLMVOWzEvV0j/3QKgmmGznq97f08XCCroFcK	\N	2025-07-25 08:31:02	2025-07-25 08:31:02	\N
b6a379d5-bec8-48d2-9782-d25a45be0ac1	Felisha Nailh Abdillah	felisha-nailh-abdillah@example.com	\N	$2y$12$T/YNBxG5oq3CmQ40aE6B9.G3L37K0nDSeoWdqef9n5PfhPjZN3eCK	\N	2025-07-25 08:31:03	2025-07-25 08:31:03	\N
a2052b82-aed9-47a7-bc8b-c7751d96d10e	Muhammad Hikam Abrisam Sakha	muhammad-hikam-abrisam-sakha@example.com	\N	$2y$12$xvdWG2eyVy/gQZ62uASIg.l8quu21x.EfyAGoL.SSe0gK45e.RzR6	\N	2025-07-25 08:31:03	2025-07-25 08:31:03	\N
2cefddbb-2655-4cbf-acdb-bd155497e4e2	Wardana Isnaini P.	wardana-isnaini-p@example.com	\N	$2y$12$8hs8eNG2g3bcNHEa/kEEIudtqYqDaNrKsxeq/XOEFpe804pTP63J6	\N	2025-07-25 08:31:03	2025-07-25 08:31:03	\N
6a61b0d9-89c7-4e9e-b578-163d94d007c0	M. Edys Khafil Achya	m-edys-khafil-achya@example.com	\N	$2y$12$05dvSrG0odJRHR042jssAeFNmE0qLA7c/0OUTDkiD0pBKDPlhSPIC	\N	2025-07-25 08:31:03	2025-07-25 08:31:03	\N
47c39683-f756-47cb-bcde-cbf215898beb	Hanum Cahaya Ramadani	hanum-cahaya-ramadani@example.com	\N	$2y$12$hNgxdnV./BQllo9ZNa3Ocu8.DYY39eMWBev6BW5.0iJTc6cMXQAxu	\N	2025-07-25 08:31:03	2025-07-25 08:31:03	\N
3f36fc67-2fef-49b7-a48b-7bad0edee4cb	Afiara Dialfreda Putri	afiara-dialfreda-putri@example.com	\N	$2y$12$GCiFSAR4hAjIkE.DI3h32.PW/K.06EibKWVnuYYOuNnw5QAqWbntG	\N	2025-07-25 08:31:04	2025-07-25 08:31:04	\N
e74e8bab-0d0c-4cd0-bd26-b2f6f671311e	Irsyahdi Kurniawan	irsyahdi-kurniawan@example.com	\N	$2y$12$caGtQVj7JmXO0QVCWxxskOtOjS2yzwidZPHe9cGYSe3n4SzlEF6R.	\N	2025-07-25 08:31:04	2025-07-25 08:31:04	\N
717988e5-33d0-4bc1-8f34-79ebf844d425	Laila Ramadhani	laila-ramadhani@example.com	\N	$2y$12$XhVyvp56wOKFkQSuOl5Sv.tJEJjuCH0DrvNd0SdvXxfMRapZWM8/C	\N	2025-07-25 08:31:04	2025-07-25 08:31:04	\N
45d6e66b-1426-4904-b210-867d6dd58444	M. Bachtiar Zalfadhli A.	m-bachtiar-zalfadhli-a@example.com	\N	$2y$12$tOOCxn7RCCVrwlFdsoUn7eFGGRoWJ/O/PC/GDJgNZ5mQTke1DFEmi	\N	2025-07-25 08:31:04	2025-07-25 08:31:04	\N
638d9601-608c-43bf-a163-4b4d141e1796	M. Deniz Muhsin Febrian N.	m-deniz-muhsin-febrian-n@example.com	\N	$2y$12$22FDb6t2tpaXLppA69l0R.hfH6Jq620VfCsky5Z9PS7TjhdPVTSKq	\N	2025-07-25 08:31:05	2025-07-25 08:31:05	\N
6bf92d78-e890-4638-bb78-ec628d842105	Aisyah Ayudia Inara	aisyah-ayudia-inara@example.com	\N	$2y$12$0RL9xuLDRTGSvuIhuusVT.6qEAD.KPQ4l4HZv1CDm9L2N1AJAHVta	\N	2025-07-25 08:31:05	2025-07-25 08:31:05	\N
afc00cab-ed38-4803-9fb5-212168127728	Welina Deflin Dwi Humaira	welina-deflin-dwi-humaira@example.com	\N	$2y$12$9i1sIdrMRus4uCnCaR0HoeJ1gY0EEkT0Qya/521Qqm6vhgo8YWpB.	\N	2025-07-25 08:31:05	2025-07-25 08:31:05	\N
a3eafca7-0c30-43e9-898b-dcce630babe6	Arzagina Nailin Al Mahbub	arzagina-nailin-al-mahbub@example.com	\N	$2y$12$6d2thTzL/e533YrbmgfSKezXpJvw7AwNWeW69rLabSLjXfJSH/SJO	\N	2025-07-25 08:31:05	2025-07-25 08:31:05	\N
887cbf07-1532-4c80-b544-45725436a52b	Ahmad Zhahir Kadafi Fatah	ahmad-zhahir-kadafi-fatah@example.com	\N	$2y$12$BctH5PrCwXMJPWo2EMVxzucVkKfki/vs05qV/Qs9hWhU696.ypM36	\N	2025-07-25 08:31:05	2025-07-25 08:31:05	\N
89622e0b-060d-4bec-be38-16f205057cbf	Narendra Zahran E.	narendra-zahran-e@example.com	\N	$2y$12$weRuoeZ9Cj7Ge7CfylB7beTdc2CXEOW3PCl5e294XUw6oATeNDyRu	\N	2025-07-25 08:31:06	2025-07-25 08:31:06	\N
c2c63a0c-1ea3-4b33-8772-7437b8145d42	Mahira Farha Fauzia	mahira-farha-fauzia@example.com	\N	$2y$12$Go6fWbzpRwn32NLSKWJPNOz2vvwtLL0ejDsG/81uAJ1Bd1jWCuwAy	\N	2025-07-25 08:31:06	2025-07-25 08:31:06	\N
c40f7e2e-a6c5-46c4-88a9-63c42141a1aa	Naufal Abdillah	naufal-abdillah@example.com	\N	$2y$12$/lskC5dt7lpB98B2bD/UN.yYIyZx15JwEK.ruSuLmZvPaf551IZ4e	\N	2025-07-25 08:31:06	2025-07-25 08:31:06	\N
f7e66252-e6cb-44f9-9a17-30361cd1e8b0	Sabrina Zahirotun Najma	sabrina-zahirotun-najma@example.com	\N	$2y$12$KXetwnBKUxvB5cE7ZZShj.26CJn406FuvhxzTZrp7itKnH2iRWvSW	\N	2025-07-25 08:31:06	2025-07-25 08:31:06	\N
c1e70680-fc68-4cff-ab3d-997c3eaabc30	Iqbal Alvaro	iqbal-alvaro@example.com	\N	$2y$12$NENpmxm.C5PglYAhoGxwvuGKEYjtVhKtKka5SgbxgnVZkPLI88SpO	\N	2025-07-25 08:31:07	2025-07-25 08:31:07	\N
ca76fdef-0474-4cdd-a773-b3a9f23ed663	Muhammad Abdul Hafiz	muhammad-abdul-hafiz@example.com	\N	$2y$12$gY8q1xRS2HDNz0Rq6U/l9eOl0rQch3SfRQD95qpmbPYp.brSG./d2	\N	2025-07-25 08:31:07	2025-07-25 08:31:07	\N
91b3c765-1016-4f7c-86d2-4fb0b34e9cab	Reihan Hafiz Fadilah	reihan-hafiz-fadilah@example.com	\N	$2y$12$XgO3VWuPlOfUe4u.E8B7L.XEyWL1IFNzowqOoWkxSWGp1FRZ.63si	\N	2025-07-25 08:31:07	2025-07-25 08:31:07	\N
5a043358-d90f-4fd8-9e22-85cc914357d5	Muhammad Alfian Arif	muhammad-alfian-arif@example.com	\N	$2y$12$mfh8pCgdmTiOQvZuGk2WReP9SQ8fL.XgKEbCBkH8C9hDCsAjudYUC	\N	2025-07-25 08:31:07	2025-07-25 08:31:07	\N
a766184a-702e-4c8b-b6f7-e6bdb25dde57	Azizah Rizky Andyti	azizah-rizky-andyti@example.com	\N	$2y$12$zeGhoMDkk53qJ36a9DBdYOY7pHRf0HDJ1Tz0cBPPTJcZnJg77IO7S	\N	2025-07-25 08:31:07	2025-07-25 08:31:07	\N
2809171a-43b7-4265-b352-e191917595ee	M. Rayhan Bisma Adiraja	m-rayhan-bisma-adiraja@example.com	\N	$2y$12$j0DUk5WDuYgFILbIR4b7R.27.CCI7MzGJsEHIT0twp/jZuIWoqnFy	\N	2025-07-25 08:31:08	2025-07-25 08:31:08	\N
e23776d0-6829-40dc-a139-e076639537d4	Muhmmad Azka fatahilah	muhmmad-azka-fatahilah@example.com	\N	$2y$12$nhfXhw1XcMNCyvskQHMThOGTlUJ2uolmVBjVzx6nOlsinrrS9EY8.	\N	2025-07-25 08:31:08	2025-07-25 08:31:08	\N
311aac6c-8a38-462c-acb8-c8460d266301	Nata Adikara Alviandama	nata-adikara-alviandama@example.com	\N	$2y$12$gwQxWjap1mT1DvjOPg0hTOLrzrJw9Accstd5ctZC97ufnAN438xl.	\N	2025-07-25 08:31:08	2025-07-25 08:31:08	\N
0fa1096a-cf57-45d1-b84d-fe63e7976070	Jihan Hasna Azzahra	jihan-hasna-azzahra@example.com	\N	$2y$12$tgMwYfi4L1V5fA6RBnum6e4V29bWRBvcC/MWKQZTr/squV.j5IvBi	\N	2025-07-25 08:31:08	2025-07-25 08:31:08	\N
0d78efa4-3557-4a51-8585-5f49ab0ff632	Natasha Kamila	natasha-kamila@example.com	\N	$2y$12$iDxZYGOwKoCIMmv2gl44je.L/X5doPKMO.9ASfAP1pi5ZTAtR6IsS	\N	2025-07-25 08:31:09	2025-07-25 08:31:09	\N
27faa0e3-7983-4224-877a-527b2c0833ee	Aura Nabila Hardi	aura-nabila-hardi@example.com	\N	$2y$12$avnPfT/xl3MkE3E51MvJVOOfXQwC4skHPztwcHInVeyqDczFAVrSG	\N	2025-07-25 08:31:09	2025-07-25 08:31:09	\N
18a6d989-469e-44bf-b9c0-85e0b8656508	Raisa Arsyila Hardi	raisa-arsyila-hardi@example.com	\N	$2y$12$kD.7o1FMpyZKY0tkSbh4UehMHrruk0tK1xifM6MkP4tdeHnN4J3Yy	\N	2025-07-25 08:31:09	2025-07-25 08:31:09	\N
ddff6627-48c0-40f9-ac67-9dddce0c4d01	Isfa'na Latifa Nutqiya	isfana-latifa-nutqiya@example.com	\N	$2y$12$YRSvgF.xKqsn6.s8DhOkW.DLzjweIB.j.G5vIGe1bT66fV6zNK2Zi	\N	2025-07-25 08:31:09	2025-07-25 08:31:09	\N
1234799f-58d5-4050-8762-969511592169	Aviza Queensha Ramadhani	aviza-queensha-ramadhani@example.com	\N	$2y$12$1iV8HISRUrLkfZ5Phq9Lq.VmKnBL4ZyxBFxADBxcc.pOtYXxdW4VG	\N	2025-07-25 08:31:09	2025-07-25 08:31:09	\N
f71ca300-fc2d-4ed5-a273-c19f0f913e59	Nafizah Askia Fadilah	nafizah-askia-fadilah@example.com	\N	$2y$12$JcMaBGWJZs0DSzFGQK5U2eEaI.cy5Fn3mV0PdxN9YySxnG8/yoneq	\N	2025-07-25 08:31:10	2025-07-25 08:31:10	\N
b7b5e715-e980-4895-a688-e511b83f6431	Almira Maulida Rahmah	almira-maulida-rahmah@example.com	\N	$2y$12$9skXZhZQlmeGg.9EDz5ubu647RY1k7zkJS.Hscky6b4x2X.kveawa	\N	2025-07-25 08:31:10	2025-07-25 08:31:10	\N
9070f521-7ace-423a-8b0f-716ae9245792	M. Reza Maulana Kafabih	m-reza-maulana-kafabih@example.com	\N	$2y$12$.2gXFir3xojW/gJ56RHOJeRaPP1rYqFMGqSwi/GV4aar07cCTN5T.	\N	2025-07-25 08:31:10	2025-07-25 08:31:10	\N
ece75958-fbfd-4fb4-851a-07d22768505a	Hamza Yusuf Asyari	hamza-yusuf-asyari@example.com	\N	$2y$12$AeufrtHLyxJEP0hQ5mTjZuM4yX39oUq0idUkBe8Q.erFqPZTdLi9W	\N	2025-07-25 08:31:10	2025-07-25 08:31:10	\N
7470c46e-cd0a-4b65-8071-44c975ec2510	Yasmin Putri Nafisah	yasmin-putri-nafisah@example.com	\N	$2y$12$wWKedZtRM6pbqK1G64GRgOzfWYB7ZojfI9RB/s0uEy0ulB7bXnNQ.	\N	2025-07-25 08:31:11	2025-07-25 08:31:11	\N
d884f058-1b31-4d65-9ed0-c39593cade0a	Amirah Azka Nafisah	amirah-azka-nafisah@example.com	\N	$2y$12$H2f.MH7MkokDkHIHcdc49uZRi6BRXqfKxF/uDUi0l/.QuEU3I8fPq	\N	2025-07-25 08:31:11	2025-07-25 08:31:11	\N
5610c697-d4e5-40da-8838-b580a358d2b7	Shabrina Callysta Azzahra	shabrina-callysta-azzahra@example.com	\N	$2y$12$Wxj.CvVeGdMd7L8aIRtX4OXFATDs4rMgR6RvJiXHh1jb1ZMX/gsC.	\N	2025-07-25 08:31:11	2025-07-25 08:31:11	\N
d9462413-9272-49ed-b41e-21e7a533c117	Skyella Nugraheni Putri Aulia	skyella-nugraheni-putri-aulia@example.com	\N	$2y$12$VeLqvHSAHvx4CkfYsIIFHeitgaVLRBpnfp.aTQIXYZFVjDPlBsiWG	\N	2025-07-25 08:31:11	2025-07-25 08:31:11	\N
24f0f67d-75d9-4260-9710-6f3073bc1a40	Azhar Nikolas	azhar-nikolas@example.com	\N	$2y$12$lLUN4OCF3EDKSciTPWf8ruXj.X/hVZEahMourw8.lKuzrnLF4XeJK	\N	2025-07-25 08:31:12	2025-07-25 08:31:12	\N
49d4b4b1-a988-4c66-8341-228fbf151524	Amrita Wafidah Early	amrita-wafidah-early@example.com	\N	$2y$12$rbX1M0FtsnZwVWiX3ZStIOxUaIrTBsg1RI8iUD7PmHoFKjCO1/jse	\N	2025-07-25 08:31:12	2025-07-25 08:31:12	\N
606b153c-ab1e-42da-a796-829fb8f90316	Shakila Maulida Nur Inka	shakila-maulida-nur-inka@example.com	\N	$2y$12$JDIxcy6ClNYaeSROgbWwGOoOYNlMQpdWxoeI1z3nD.q0fOo9tzlfG	\N	2025-07-25 08:31:12	2025-07-25 08:31:12	\N
c4814c2e-757f-4ace-b39b-892c298341ba	Hasna Perempuan Prayogo	hasna-perempuan-prayogo@example.com	\N	$2y$12$lCVr8JBIpTx52zfLuRS.aOeFK.0x3WiWhDYlUGsVu3n0WbPpxt3XO	\N	2025-07-25 08:31:12	2025-07-25 08:31:12	\N
bb5d955a-5b8f-41cb-b3b1-5938ffb399ce	Fatimah Hasymiah	fatimah-hasymiah@example.com	\N	$2y$12$L6ARFdrzWoyZTWNZo4YIEuSwgLtx0OYXuGNF/v7T9ErHtzPaGTspW	\N	2025-07-25 08:31:12	2025-07-25 08:31:12	\N
9740db0c-9aa6-49e8-8df1-9c406347ba56	Dheandra Alunna Nugroho	dheandra-alunna-nugroho@example.com	\N	$2y$12$D6aKgxkcuAFCHtgGry0.VOFxaLphw0GOyeIJtCT6qtNeaiO8UOrui	\N	2025-07-25 08:31:13	2025-07-25 08:31:13	\N
fdaf9bae-4140-45f3-a274-c1f78f4de9dc	Najma Athifah Alfiqni	najma-athifah-alfiqni@example.com	\N	$2y$12$27oDopaBNCGr4Jzqh3k9eeFR6UZ6bic4iyYhnD5JS3yMXS8xmYHhu	\N	2025-07-25 08:31:13	2025-07-25 08:31:13	\N
88d650c3-cebe-4e90-ab79-767a1a7eba93	alvaronizam abid abqary rasmaja	alvaronizam-abid-abqary-rasmaja@example.com	\N	$2y$12$UOytPEpMC/9u5qhzPl42JutEFlpy2T7fdVak472IvcaM.HPfsava2	\N	2025-07-25 08:31:13	2025-07-25 08:31:13	\N
03537744-fa23-490c-8fea-8b1c5df9fbca	M. Adya Surya Wijaya	m-adya-surya-wijaya@example.com	\N	$2y$12$GaXvQtAcBn1VDB3298frj.mJ3.dPr6PmrTu6upzDowwcJ5QwlHvnW	\N	2025-07-25 08:31:13	2025-07-25 08:31:13	\N
0cc6715a-261e-404f-a89a-5f721c9dea25	Diva Justisia Larrasati (Diva)	diva-justisia-larrasati-diva@example.com	\N	$2y$12$rvwVQQ4FTr8ncVLyZvxiJe.ldxm3SMjgem5mlsMh8B2DmfFx2LC9y	\N	2025-07-25 08:31:14	2025-07-25 08:31:14	\N
e3236597-de7d-47f3-8d7e-f441f9832505	Sultan Kastara Arfandi	sultan-kastara-arfandi@example.com	\N	$2y$12$4HDN.7Z8gpFisefhllw2Re/uvUQGe67O26ampLgkWbHTAdMJTzrUS	\N	2025-07-25 08:31:14	2025-07-25 08:31:14	\N
7ba2ea21-1414-4cea-a581-bcaff9d0a103	Teasha Naura Adhail	teasha-naura-adhail@example.com	\N	$2y$12$ZpJ1cj6EP49WiiyjKZOQkemRS8eoKYp60..6sMOqTDJ1OYmCP2P56	\N	2025-07-25 08:31:14	2025-07-25 08:31:14	\N
993d433b-f0e8-47c0-a408-b8c38c6b53e2	Ashafa Ghumaisha Alia	ashafa-ghumaisha-alia@example.com	\N	$2y$12$yiooLFjet2uWTbbuKDB7f.3p.M6yLf4p866EjqfU.JO/kpGKKwSR6	\N	2025-07-25 08:31:14	2025-07-25 08:31:14	\N
ac37652f-630d-4580-b284-f8623bee5384	Syakira Qonita	syakira-qonita@example.com	\N	$2y$12$1MfryhN4NE10PkI0j5PNpOGbiuDbLWLWM2dbbI5Ho2m9bdznhbTh2	\N	2025-07-25 08:31:24	2025-07-25 08:31:24	\N
f1569cfe-6cb3-442a-ac0b-68145bd1c169	Grace Anindya Christaceline	grace-anindya-christaceline@example.com	\N	$2y$12$rEvT.0oC4ehlLKvlHTZgDOwahxwyheFL6jNB2RFUdrTtKackyhXoq	\N	2025-07-25 08:31:14	2025-07-25 08:31:14	\N
5821d6dd-dc25-4c80-9e2c-c5b46125b054	Kinarian Bellvania Christacheryl	kinarian-bellvania-christacheryl@example.com	\N	$2y$12$46OhjQZrR66Da6opqbDeIuWh91681wWDGqAmMwJQEilUzxaNWM96O	\N	2025-07-25 08:31:15	2025-07-25 08:31:15	\N
1a86fff2-a68b-4486-bf56-171905eaf1cd	Nadhifa Najwa Khaira Arafat	nadhifa-najwa-khaira-arafat@example.com	\N	$2y$12$j4h59gIVMvKqAQjZdcnLFe.bJ4Qy/3wJURvyQDdPJsG6W92/zf6XS	\N	2025-07-25 08:31:15	2025-07-25 08:31:15	\N
76fbc231-2aa5-46c3-a788-c2cefac9e94f	Jihan Talita Ulfa	jihan-talita-ulfa@example.com	\N	$2y$12$AcFf/wXdGzI7MsHfUouJhO8/zfpmenHtJWFZS3h4EKD4Aqkxfo.BS	\N	2025-07-25 08:31:15	2025-07-25 08:31:15	\N
a509222e-9836-494d-a5f4-6db5ccb14376	Syasya Talitha Mughni S.	syasya-talitha-mughni-s@example.com	\N	$2y$12$uXmUdg6fTbBW4Z7wk1WiJ.R3VTD3l/yKlcDklbC7RkL2mp99HDPwK	\N	2025-07-25 08:31:15	2025-07-25 08:31:15	\N
6a270527-0dbc-42e0-8578-aee840fb067d	Alesha Naila Tsaniy	alesha-naila-tsaniy@example.com	\N	$2y$12$JoaEirAmfOIvAlcJM/4zJekCmqTUHky7mUPSfiQ0mu4PEac5SSZ6e	\N	2025-07-25 08:31:16	2025-07-25 08:31:16	\N
50e83946-ecae-4cd6-afd8-f24449b87512	Bintang Karuna A. D.	bintang-karuna-a-d@example.com	\N	$2y$12$0ZrKwsX3eVMq4xiPvclSs.ofl2hlEF.NNy3xmEdsOPtvlfEk7tQ06	\N	2025-07-25 08:31:16	2025-07-25 08:31:16	\N
61c608d0-0ab2-44ee-a208-21c2f6570895	Qeyshafanni Hazna Febiasti	qeyshafanni-hazna-febiasti@example.com	\N	$2y$12$XpXzzVZd29tr9t3STQqaiO6K4l2bxcEPBJOxNg2EiBGJi0Cfhj42u	\N	2025-07-25 08:31:16	2025-07-25 08:31:16	\N
99613a4d-754d-4d6d-a3d0-4a6249ea254f	Aqila Zahira F	aqila-zahira-f@example.com	\N	$2y$12$CTVF/BELwLKEwZmKr9jJi.eTlleZ7wWfVMG9G25m6L63csb4HruOO	\N	2025-07-25 08:31:16	2025-07-25 08:31:16	\N
49d62571-ca28-41b1-bdef-526086977c42	Jennitra Putri Jernih	jennitra-putri-jernih@example.com	\N	$2y$12$m/YEEZAAooyqwUuiVlHSfOFid8MaK7jjgEAgZSG5M.CXeSNx5Pi7i	\N	2025-07-25 08:31:16	2025-07-25 08:31:16	\N
69238801-d332-44c7-8f82-8d952028ec0e	Moh.Oktafian Firdaus	mohoktafian-firdaus@example.com	\N	$2y$12$XTNi3E2rJwMvMOhBsyURWOfwViWrW61YnvS9eZyAtaWnqiBCCUfTW	\N	2025-07-25 08:31:17	2025-07-25 08:31:17	\N
01ee6bce-6347-464d-84b4-3529cae8b027	Marga Hutama Kurnyawan	marga-hutama-kurnyawan@example.com	\N	$2y$12$1X3zFfsxcDXa/FsQiZuTceYNRFwOIK/mPQ8YSsb0XeJpvxJgaflz.	\N	2025-07-25 08:31:17	2025-07-25 08:31:17	\N
6f14ef12-2510-4e1c-853b-c361bc033e34	Adskhan Ibrahim P.	adskhan-ibrahim-p@example.com	\N	$2y$12$5w03B67Q1aJcU3qOl8Lhae4JMKeIuhiq43oirrOeKHQWaA9LvNBMu	\N	2025-07-25 08:31:17	2025-07-25 08:31:17	\N
45315661-886d-4651-9292-a0f8ba6508f8	Alesha Maurits Faylasufa	alesha-maurits-faylasufa@example.com	\N	$2y$12$RBT8XWxSzLa0EXtf.xJ6lOu.wrtpfY2EzED4NwhzZ1Oo8z9QNHxBG	\N	2025-07-25 08:31:17	2025-07-25 08:31:17	\N
6483c021-5fa1-4dd1-9987-ef9b38a5779d	YHARA AQILA AISHA HAKIM	yhara-aqila-aisha-hakim@example.com	\N	$2y$12$yyluVIU7Jr4y4.oNhDA10.ZMLQ7i8N5rvSYUW6ip2sUC5SaYi2iQO	\N	2025-07-25 08:31:18	2025-07-25 08:31:18	\N
d7dbb3d8-dc28-4972-8a7e-ad49808c5ffe	Athariz Mirza Abiyyu Ayasa	athariz-mirza-abiyyu-ayasa@example.com	\N	$2y$12$EJanf3OAXtbirgtyfzmx/eeyN5KUJQf0OzfTv9FVbXShEGuSzy.iK	\N	2025-07-25 08:31:18	2025-07-25 08:31:18	\N
27806fd6-c183-4eae-8b34-80ae71089b38	Axelle Shakeel Abiyyu Ayasa	axelle-shakeel-abiyyu-ayasa@example.com	\N	$2y$12$7oYLkmleM73cIct3GcHFyeT1NhXdr015ifI0A2ILQjYyBPcF3BUm.	\N	2025-07-25 08:31:18	2025-07-25 08:31:18	\N
d0183174-58ef-4ae1-919d-f8ffa295dfee	Ayra Deyhani Sembodo	ayra-deyhani-sembodo@example.com	\N	$2y$12$J0a2vV1fYavlutz0KbJ0BeSRyvLUWNFxab77dgc2.GQvO0.k85B2K	\N	2025-07-25 08:31:18	2025-07-25 08:31:18	\N
280a54dd-b7fe-46cb-b7f4-67a3f74d869e	Krisandelia Janitra Kusuma	krisandelia-janitra-kusuma@example.com	\N	$2y$12$XF5GAmFhr9mv/0qC2E9ZBuyrhUgxnWxKMDcaJG3CzrRT0C3CFObke	\N	2025-07-25 08:31:18	2025-07-25 08:31:18	\N
facde057-01f6-496e-878f-13a2839b40dd	Khansa Agniamaya Z.P	khansa-agniamaya-zp@example.com	\N	$2y$12$8gs6GwSBMB54n71iSV.HruseHsu8hz0BohR.IxfUOZSvzVYIDcJTW	\N	2025-07-25 08:31:19	2025-07-25 08:31:19	\N
b47cc42f-7db2-4e19-a407-3055f4b5c653	Muhammad Ibrahim Anarki	muhammad-ibrahim-anarki@example.com	\N	$2y$12$CDYp8/OTEUOOB2O9fvzYxu.EVBLBU7gE1HCm/yhCoEwdcDe1O13HC	\N	2025-07-25 08:31:19	2025-07-25 08:31:19	\N
aee39639-909c-4d50-9c52-4ceba87985a4	Alexandra Callista kirana	alexandra-callista-kirana@example.com	\N	$2y$12$dtV46C.JmZ/4MT72hAp.B.HkvlQKt1cND2gsy5z0EaSyElgYW56a6	\N	2025-07-25 08:31:19	2025-07-25 08:31:19	\N
c3fd7d42-52ed-430f-95c1-b729e8bcecb5	Muhammad Raihan Firdaus	muhammad-raihan-firdaus@example.com	\N	$2y$12$yVW3cwvQSr6/JRjovL3Ayej.ROVGgEzBr7DExh4tUPBPMHpJMer0K	\N	2025-07-25 08:31:19	2025-07-25 08:31:19	\N
90fd920d-3756-4fe0-9183-4770c29674ec	Muhammad Zafran A.	muhammad-zafran-a@example.com	\N	$2y$12$03f03cB9UHXZo1K5MoI06uh5bjgyGFdLx.H/parEQWkmFg1FAm6C.	\N	2025-07-25 08:31:20	2025-07-25 08:31:20	\N
c1df07e6-2d0d-442d-b16c-39ced39e77da	Aisya Naufalyn Z.P	aisya-naufalyn-zp@example.com	\N	$2y$12$1wEerIgcnSp7.KxlQyUl4eWNnZn1hYZZjN3etT.uWx0DFf8k7hHMi	\N	2025-07-25 08:31:20	2025-07-25 08:31:20	\N
39f8fa33-0b26-473b-af17-46b0aee2b20c	Nadhyra Zyva Artanti H.	nadhyra-zyva-artanti-h@example.com	\N	$2y$12$c/wvKxPi/fXqu1sojetEqeWZOzFh1udAbMAPbIjs99aXvEBxJfGvq	\N	2025-07-25 08:31:20	2025-07-25 08:31:20	\N
b9d41e60-9506-4883-81a8-3be9cb16590a	Alifia Widyanatha Maharani	alifia-widyanatha-maharani@example.com	\N	$2y$12$7MO3/RTFgKXPURN5e8rh4uv5solhZKRse6vnvj.XFDDV914wfKPYS	\N	2025-07-25 08:31:20	2025-07-25 08:31:20	\N
44ce4199-b94c-4cab-87f3-82767761d4f5	Belva Arawinda Zahra	belva-arawinda-zahra@example.com	\N	$2y$12$kdihPmVYJeIrgor3sobKDOaUks1nG5lJZmqcbMSQv9QU92u7e07by	\N	2025-07-25 08:31:20	2025-07-25 08:31:20	\N
26c90326-03c4-4908-b0b5-3bd243096561	Chalila RD Mora	chalila-rd-mora@example.com	\N	$2y$12$zCSZ53ZSgTYHL/Ae3nRYF.rZBMSb037.PXpmO4HV3LvvsBK6/31aC	\N	2025-07-25 08:31:21	2025-07-25 08:31:21	\N
f6beba79-aa89-42ed-85e8-b96b8c32a419	Afrian Dhea	afrian-dhea@example.com	\N	$2y$12$fgCWPPz8BKANFGW0XKtV5elctNjPZKvyy8GzQpgrHEHXjIg7cOBf6	\N	2025-07-25 08:31:21	2025-07-25 08:31:21	\N
98993198-7437-4a6e-b1d1-05c1c2c7ac03	Melody Kanindya	melody-kanindya@example.com	\N	$2y$12$XymG3xBYZDdokkQLg2i5gOQ5NjHwycBU3.yDTV0XfSHd/y7kWbWvS	\N	2025-07-25 08:31:21	2025-07-25 08:31:21	\N
87126e17-5096-4d1a-a508-19876b52da65	Clemira Azkadina Mieko	clemira-azkadina-mieko@example.com	\N	$2y$12$kiRsvTMN7MD2R4kz0XXu7u.3HvqaXphT.M9jdduvyfEv9/d5GXS1m	\N	2025-07-25 08:31:21	2025-07-25 08:31:21	\N
96beb17d-cbb4-41af-af0d-7fd152065dee	Kimora Assyifa Malika	kimora-assyifa-malika@example.com	\N	$2y$12$rTBuS3wjqmAA.QgeuTU2BOhuHS78wnv/TacRjRLeQqoQD6b8VDzqq	\N	2025-07-25 08:31:22	2025-07-25 08:31:22	\N
993ca109-a90f-4be8-98b4-274a016fa933	Muh.Saky Dian Prasetya	muhsaky-dian-prasetya@example.com	\N	$2y$12$iNJGk0lEnuIKrH2/9SB1TemBURhcXbaYdiRborggN90sK4RCl9wTW	\N	2025-07-25 08:31:22	2025-07-25 08:31:22	\N
902082e3-008e-46b1-81fa-2add5e5144a1	M. Athalla Alfarezel Hidayat	m-athalla-alfarezel-hidayat@example.com	\N	$2y$12$x9UWgonAHwzF8AP2uAjFMO5dgNZ0xHJcwAPYJhyL1.pAzeMUGYJry	\N	2025-07-25 08:31:22	2025-07-25 08:31:22	\N
f973a1bc-92c6-4fe7-a2ef-6db130bede07	Satwika Kinarwedari	satwika-kinarwedari@example.com	\N	$2y$12$6jov0P0dtRW0kM0MxFSCL.jINlQCmLWGNVmftOpouVNWQs6xmzUE2	\N	2025-07-25 08:31:22	2025-07-25 08:31:22	\N
c94971ec-fe5e-4d7d-8cf4-b1c9861325eb	Arganta Putra Anggono	arganta-putra-anggono@example.com	\N	$2y$12$m8TcwHWPXnLfBK/nuRHuCOahAIXuMttgoibp92xxJCgwibo8vZFzi	\N	2025-07-25 08:31:23	2025-07-25 08:31:23	\N
8920665f-0d7b-47bd-bfaf-e7f3d0c725e2	Nabila Khansa Putri Andri	nabila-khansa-putri-andri@example.com	\N	$2y$12$gP3VlHPWvghelPW/0b3cueglX.eHSkw/QEsYxj1RfRKUUgrWIfYmu	\N	2025-07-25 08:31:23	2025-07-25 08:31:23	\N
037f12c3-2621-41ad-90a5-251f924f6e2b	Aisyakira Zara Zalika	aisyakira-zara-zalika@example.com	\N	$2y$12$s6s6YZkhiCxo.A4Hp4NpvO1Y156eFUGucXfH684tMa6Cqd./imeIq	\N	2025-07-25 08:31:23	2025-07-25 08:31:23	\N
cc3942aa-6b3d-429b-bbd8-006cfc55d9f8	Achmad Amzo Prince Alazmi	achmad-amzo-prince-alazmi@example.com	\N	$2y$12$O6XYY1/8zpJyAk2Z84nrxetHomeAYK7koS6FiK9Zrdmilnaivd9XK	\N	2025-07-25 08:31:23	2025-07-25 08:31:23	\N
a019fbd7-a8a8-401e-96f5-08710963a176	Mayrich Anza Princess Achmad	mayrich-anza-princess-achmad@example.com	\N	$2y$12$yUUmJ41jP9N6kCRzZ2wKeeG6IiIVF/NM44Pts4I.6PZ4ciISDJG8W	\N	2025-07-25 08:31:23	2025-07-25 08:31:23	\N
19a52d7a-218b-47da-a7d7-1c8bee2e1474	Regina Hanania Orlin	regina-hanania-orlin@example.com	\N	$2y$12$Z7xKE9Ajoh809RB1c2i0kuMkgvkMuR2/XQFAmYuFtMWalKmzen56u	\N	2025-07-25 08:31:24	2025-07-25 08:31:24	\N
231b41b8-395d-4163-9bca-1798b78ae39d	Donita Queena Nugroho	donita-queena-nugroho@example.com	\N	$2y$12$X8dSdZmMOZ3qDUK9z7SHweXoPm1t7Wj4fnbGuMeEsV8OvjQaafcqW	\N	2025-07-25 08:31:24	2025-07-25 08:31:24	\N
597be224-83f0-4890-ba08-b9f3b0682091	Intan Rahmania Septianti	intan-rahmania-septianti@example.com	\N	$2y$12$Db8HwHdoejppsStRz9Pei.wPMv.rtv8yM/EXyHy76pbbonb7078pe	\N	2025-07-25 08:31:24	2025-07-25 08:31:24	\N
8235b7e8-e7d8-40f2-9d0c-15f2c6d2db0e	Muhamma Ali Nizam	muhamma-ali-nizam@example.com	\N	$2y$12$7c1WrvZ4LyzsGrib5S1TwuzF.GnNIO//OgTNvNfAorx5fseZc7i3.	\N	2025-07-25 08:31:25	2025-07-25 08:31:25	\N
569c31dc-3d3a-4491-94a6-4ec33cd98cb1	Diana Fahira	diana-fahira@example.com	\N	$2y$12$f4gyb7U/4aGvS6XNyiPgmux1FfOlENvLiMCxTNRhWJ9K528PxebBi	\N	2025-07-25 08:31:25	2025-07-25 08:31:25	\N
55ad3df7-34e6-4386-925e-8d35d620c212	Reizalio Abiyyu Pratama	reizalio-abiyyu-pratama@example.com	\N	$2y$12$.IiozfVaqGWySglwDTSttucJps/hiIPFTJsD6L0PSxqdw5A0LyjeS	\N	2025-07-25 08:31:25	2025-07-25 08:31:25	\N
b0925163-7503-449e-892a-8a151e37b71e	Benhur Abimanyu Kambunandiwan	benhur-abimanyu-kambunandiwan@example.com	\N	$2y$12$ApTQbdcTF01y6G9UQLEWGef2kR/Y5qIx9582wCSgzaNtcPgLjQpE6	\N	2025-07-25 08:31:25	2025-07-25 08:31:25	\N
f37cb5c3-4da3-422a-854d-0107a6bf1863	Zelmira Raya Asbullah	zelmira-raya-asbullah@example.com	\N	$2y$12$KPL2mIgj1CS2ms1Bzl/ESOLETQRbHdNM84pHOYkzAoJGzeyWbyW.C	\N	2025-07-25 08:31:25	2025-07-25 08:31:25	\N
896e6a02-9aaf-469c-aabf-2b74f5ab4765	Nadya Shakila Azzahra	nadya-shakila-azzahra@example.com	\N	$2y$12$mpeUNEyFJYEAH7F4DlU2IOKhdYGveJLj3Kv3.ivalPDE50nOI3kQG	\N	2025-07-25 08:31:26	2025-07-25 08:31:26	\N
90046f2f-c9d3-4208-b171-58dbaac14962	Nadya Shakira Azzahra	nadya-shakira-azzahra@example.com	\N	$2y$12$r8xgP11JnPF.IyveH.LsbO7lvDCaccsYad8gYo1XIkRHKnepAyMhm	\N	2025-07-25 08:31:26	2025-07-25 08:31:26	\N
8eada748-0dfa-4690-b7fc-8fc7f490c559	Zafran Al Gani Zein	zafran-al-gani-zein@example.com	\N	$2y$12$OTCfKcU2.KwvfF1qeCqtsu51F./lAH4sebTfwyHpNA4vejSyzBlDi	\N	2025-07-25 08:31:26	2025-07-25 08:31:26	\N
369c37a0-fef0-46c1-9314-e92152995efe	Rayyan Rizad R	rayyan-rizad-r@example.com	\N	$2y$12$xTFmKrQybc5K9mkX2tEFNOr3FT7TH7AYNG2PLJHbtyQBJQVn.IlGq	\N	2025-07-25 08:31:26	2025-07-25 08:31:26	\N
580c5c41-a4b6-4f2f-87e7-79e9034f0432	Innara Zafirah Dee Lubnaa	innara-zafirah-dee-lubnaa@example.com	\N	$2y$12$Igq07Icox8RUBIjk6.eF/ulQEKfUJDwdKQX/FrTgsAZyQfmK6LdGm	\N	2025-07-25 08:31:27	2025-07-25 08:31:27	\N
ed077f55-ee45-473f-877e-792685b676bf	Lashira Qalesya Fadheela S.	lashira-qalesya-fadheela-s@example.com	\N	$2y$12$FIpz4C/mbcDNwwlPE.f0DOnAdQsspHfb6vdMURs37lz5Q..2S44d6	\N	2025-07-25 08:31:27	2025-07-25 08:31:27	\N
e18bd1c3-5ec5-4438-90fa-e78f4b3162ff	Astra Izzanita	astra-izzanita@example.com	\N	$2y$12$50T7xvIRTLCW26LsGm274Orf38LYkK9w5DB5gjORZhj7bISxVp2v2	\N	2025-07-25 08:31:27	2025-07-25 08:31:27	\N
bd8be0a4-7ad2-492b-b4fc-eb04dcd9ece0	Kaira Kamila Mulyono	kaira-kamila-mulyono@example.com	\N	$2y$12$m85H06/gRWaORXObJcL.DOLNbuNPJ2HHl9Uw8aiCpDfYFwQ91sf6O	\N	2025-07-25 08:31:27	2025-07-25 08:31:27	\N
d0dc9ff5-058b-4647-bd5f-87b9dde69504	Yasmin Khoirun Nisa M.	yasmin-khoirun-nisa-m@example.com	\N	$2y$12$hzo.tvYSvCl4ooEu3hAF7eUFOHJMckVCWfCAFMes/etqvJdpC1Hhq	\N	2025-07-25 08:31:27	2025-07-25 08:31:27	\N
e4b72a01-f04b-4f6e-b632-3ac5ea3df510	Dianda Qila Alhimya	dianda-qila-alhimya@example.com	\N	$2y$12$uT20vJdrPc6tJxQ.Au8/9eTmfaouvVuwM9vvC1DdG3f7AAfZ0ano6	\N	2025-07-25 08:31:28	2025-07-25 08:31:28	\N
624f050e-edda-4931-9e32-adb16143d654	Muhammad Arif Arkana	muhammad-arif-arkana@example.com	\N	$2y$12$Guu2pSpKQIOXJPsZTCA/Y.dXGFgGtA3bDCQhCzZVeO8AP/0XaLZr6	\N	2025-07-25 08:31:28	2025-07-25 08:31:28	\N
c9e0b280-b1a7-467c-81b3-71036bb1e29c	Fatih Muhammad Al K.	fatih-muhammad-al-k@example.com	\N	$2y$12$cePW5B5KM117cSkU8R.1LubbTIB7AlZ0Sbhjlzrfzzr0Ueo8b0z2m	\N	2025-07-25 08:31:28	2025-07-25 08:31:28	\N
e60ae30a-4e3e-40f3-a67f-effe91513d69	Rania Zahira Ashalina	rania-zahira-ashalina@example.com	\N	$2y$12$M9o5QMGnKbaqYLwqqhGLEuTTe.5EXz54Z.SL5qd1V2Wht3QbeBd16	\N	2025-07-25 08:31:28	2025-07-25 08:31:28	\N
8c7fb5b4-c9ec-4136-842e-55ff0defc04f	Muhammad Abiyyi Athaya Sarwono	muhammad-abiyyi-athaya-sarwono@example.com	\N	$2y$12$erAGfzKzj4Qt3M6.YKrhT.gMFlGBhV4XRd1LCHB1XhKHJDi/F/X8e	\N	2025-07-25 08:31:29	2025-07-25 08:31:29	\N
2f61cf55-4a44-400f-93f2-0c848d3391df	Chelsi Alesya Ardani Basuki	chelsi-alesya-ardani-basuki@example.com	\N	$2y$12$Lrx4b9lMj3ZvBIk/sFLlLeh40VXGOi10KocJUK2qeQjc8ofjs9ZeS	\N	2025-07-25 08:31:29	2025-07-25 08:31:29	\N
77e81b9c-413f-4f84-b079-789d8c4e91d7	Ahmad Ahnaf	ahmad-ahnaf@example.com	\N	$2y$12$TCvajOg6aeo6wOWXDgsj1O/kfKouNUL6Cpxw1UKcVa7t75QRpLVDi	\N	2025-07-25 08:31:29	2025-07-25 08:31:29	\N
bd93430e-356f-4bf4-8bff-25bea68e3863	Amru Anas Safaraz	amru-anas-safaraz@example.com	\N	$2y$12$VsvJiTIGLcoFTPgx8G60O.9IPsBEC9n/OvwHCplFbXUS0vKlUNZTq	\N	2025-07-25 08:31:29	2025-07-25 08:31:29	\N
3ed18607-36aa-48d2-8d94-9203930c2f51	Sazia Adiva Wijanarko	sazia-adiva-wijanarko@example.com	\N	$2y$12$N2f7rMUr3lLZk/E572YyIO9rsEQvW0oTDIyfQE46BjgEzwjtspbQ2	\N	2025-07-25 08:31:29	2025-07-25 08:31:29	\N
39d32c57-8755-4f8c-a147-6d39d2da9699	Jannetra Nismara Bening	jannetra-nismara-bening@example.com	\N	$2y$12$NnF7/Ttwlrmp94xzIi76hux1Vd3tXsonxXxnYh.blQ5SkELtYNvxW	\N	2025-07-25 08:31:30	2025-07-25 08:31:30	\N
02fde402-6208-48fe-bb0e-3de0c574ee5f	Maiza Chanda Noura Widodo	maiza-chanda-noura-widodo@example.com	\N	$2y$12$90BQc7Qq3iHxgniBnBIxauMTiD.U1LXyggGt8t8YfgMZPEUacQ06a	\N	2025-07-25 08:31:30	2025-07-25 08:31:30	\N
12f9eebc-ce2d-4f55-8e29-d10ccbdff9db	Danish Zikri Alkhalifi	danish-zikri-alkhalifi@example.com	\N	$2y$12$VahmGV8L95QTJfDpbkwp6uw3pzcEcA8jQFxWtSLu.DE7gajlp0B8u	\N	2025-07-25 08:31:30	2025-07-25 08:31:30	\N
8d3f756e-25f0-4ef5-92ef-eecbdd110568	Nirbita Aisyah Windhiharto	nirbita-aisyah-windhiharto@example.com	\N	$2y$12$/iEZKUvdYuq7Lzj1c//VFumAjE2OEx4yualujDq1C5p/aEAkxZt0a	\N	2025-07-25 08:31:30	2025-07-25 08:31:30	\N
d2dcf160-4400-4743-b750-68e1492a380d	Aiko Zanetta Ameera Utama	aiko-zanetta-ameera-utama@example.com	\N	$2y$12$6zcnM3c/2qJ2rmxir12IgunVKMcqyUYS5QxwREn.6.45VXvsc3bWW	\N	2025-07-25 08:31:31	2025-07-25 08:31:31	\N
569824da-7415-4786-8ab9-5c83c8b7933a	M. Afkar Abqory	m-afkar-abqory@example.com	\N	$2y$12$5wMJIhqDQ0Q.JW11gMys1.eb4MennlUtTmideuQWbI97gtMSCKypa	\N	2025-07-25 08:31:31	2025-07-25 08:31:31	\N
8b9e0259-44aa-46b5-b54d-14e00b77e85c	Agha Nabigh El Rafif	agha-nabigh-el-rafif@example.com	\N	$2y$12$2Sc8uB5OM9pExS1nwj28ZejRGJGDxvhDHZLIQ1Nf0AyO3MfqhCGia	\N	2025-07-25 08:31:31	2025-07-25 08:31:31	\N
2af72e03-da86-42e5-9dea-bf12760afa28	Faaz Abrar Al Fatih	faaz-abrar-al-fatih@example.com	\N	$2y$12$6hN4A4SpMKavHtJXsyBp2OlV5rdeAdVKLmDYjwY3rUmeZntU0tTl.	\N	2025-07-25 08:31:31	2025-07-25 08:31:31	\N
1572e716-c6fb-47f6-b7ba-66ac8f123bf4	Arzachel Danish Aldebaran	arzachel-danish-aldebaran@example.com	\N	$2y$12$Ivh8u2B7w/QRPOpSlXfbbuEC6aBlbV8adPE0NkKHUOKoURY47LAuS	\N	2025-07-25 08:31:31	2025-07-25 08:31:31	\N
800aa08f-692e-4033-b442-38210d7c5dbe	Adelard Dhafin Aljazari	adelard-dhafin-aljazari@example.com	\N	$2y$12$f/yFGO4YdyUU8.FjERhnKusBQZPUpZpW67VHHYCaMUHhSONd4ncDe	\N	2025-07-25 08:31:32	2025-07-25 08:31:32	\N
ed0ff92d-d606-4e48-9c6c-db53c4089123	Almeera Clarissa Noura	almeera-clarissa-noura@example.com	\N	$2y$12$psnskcmgkp7ThLKce33nWOZ3nDBw.B67417cXmmxpWJRo4JqjUGQC	\N	2025-07-25 08:31:32	2025-07-25 08:31:32	\N
2938900d-c774-412e-8f5a-2fe2be33eff8	Ahmad Naufal Aqisty	ahmad-naufal-aqisty@example.com	\N	$2y$12$EgogWCI5MnkZ8Bw13QA1fuX2onnEUwGi.XhfVihPaFaIME4VZ15GO	\N	2025-07-25 08:31:32	2025-07-25 08:31:32	\N
1a7e946a-750b-4e21-b5da-e90cd94f2505	Angel Sofiya Fitriani	angel-sofiya-fitriani@example.com	\N	$2y$12$oOd1yml3pz3oCT3R0ktRf..fSe38S7bTbrGyMcDUa9ty4AlQ2V7Du	\N	2025-07-25 08:31:32	2025-07-25 08:31:32	\N
fe9ea549-dd8d-4cfd-892d-789411a39f18	Muhammad Abyan Ahnaf Fahreza	muhammad-abyan-ahnaf-fahreza@example.com	\N	$2y$12$ObjbT.Dfa4b0ucwWDZvepOAkKdChBiUYK2o9TjQR2ahURetqwvoDS	\N	2025-07-25 08:31:33	2025-07-25 08:31:33	\N
374a226d-efcd-4605-8a11-9108c03a8587	Sheryll Sheinafia Salsika	sheryll-sheinafia-salsika@example.com	\N	$2y$12$Ie8PPuEpRtqwDhYweC3C/eJcoOWru7MrJEmQSfjn25zYUCemuzRdO	\N	2025-07-25 08:31:33	2025-07-25 08:31:33	\N
8f729fbb-fe10-440b-b3cd-9ffc893d743f	Mutiyah Abidatul Fajriyah	mutiyah-abidatul-fajriyah@example.com	\N	$2y$12$XXXTwEvE8h1ZEqc7O6ItluK39Ti9Y3CB37ivHl0b/X.I0XQXbrg7q	\N	2025-07-25 08:31:33	2025-07-25 08:31:33	\N
7223ab73-1044-4e6d-86f7-c3d32d5edb53	Fatimah Azzahra	fatimah-azzahra@example.com	\N	$2y$12$6AjZjVaw5.F04UB4/CrbfeMa6H/LYbzj3qnP.YTS/2JRiLt1XlbvS	\N	2025-07-25 08:31:33	2025-07-25 08:31:33	\N
02eabc09-b9fd-4708-abb7-01706b10222c	Mishel Shakayla Putri Jaya	mishel-shakayla-putri-jaya@example.com	\N	$2y$12$8Nm6aSfPwtwLgFfXu8BziuqXUAJ6kfw/cUzu0bbLG0WFxGGdRmIHq	\N	2025-07-25 08:31:33	2025-07-25 08:31:33	\N
eecbb478-dbb9-415b-a4f0-5c5cfeff95bf	Mikhail abdad Khairtsabit Jufri	mikhail-abdad-khairtsabit-jufri@example.com	\N	$2y$12$vlLp2ExVJSoIxvbRUmh0UOoBNllQiNscNufuGZORe7rs9fE4kXTSC	\N	2025-07-25 08:31:34	2025-07-25 08:31:34	\N
7264ef52-942e-4b7e-8696-ff33c71636cb	Jibbar Kirami Ali Panenggak	jibbar-kirami-ali-panenggak@example.com	\N	$2y$12$JKJX8FNOU5zO6uAJdtwiYen.gElhjCvBTfim/i/EZLTjRUjDjOdAC	\N	2025-07-25 08:31:34	2025-07-25 08:31:34	\N
65656fda-3fba-4353-9c8b-939dc9b7efaa	Kaisan Hashfi Abdillah	kaisan-hashfi-abdillah@example.com	\N	$2y$12$RcPVelJ0vO..WayakRbbq.vfb7MjkkU2DbrTew2eimrclfWkJVnki	\N	2025-07-25 08:31:34	2025-07-25 08:31:34	\N
9cdaae5d-1edb-4d57-93b0-977a6da652cf	Khadijah hanania Adzkiya	khadijah-hanania-adzkiya@example.com	\N	$2y$12$3FLpW3Q7B8NUco4mTf9ME.qMm6BMEMgS7rud0iJIfSSRsZo7Bc6t6	\N	2025-07-25 08:31:34	2025-07-25 08:31:34	\N
9d001dac-7d57-4381-8524-1062f3b9434e	Adiba Khanza Azzahra	adiba-khanza-azzahra@example.com	\N	$2y$12$mkYPni4VxFQlu25xAyBEj.hKjGMHlpMKL0Mg2vwTQmol9k5ygPch.	\N	2025-07-25 08:31:35	2025-07-25 08:31:35	\N
1a77fe68-03f0-4f5a-8d4b-b4b792243194	Jenahara Al Gani Zein	jenahara-al-gani-zein@example.com	\N	$2y$12$61i3bSZW1gi2pl2iJJ10.OiwzxSsVb6rC0GJf08siZBvJMcajgTzC	\N	2025-07-25 08:31:35	2025-07-25 08:31:35	\N
424b0784-323b-42a1-a4ed-a99c45783b97	Mohammad Aiko Falah El Qodri	mohammad-aiko-falah-el-qodri@example.com	\N	$2y$12$fl3roS7SaQLmr8SNgKopOefAo6c3NO0.ibkNu/x9xogigy.guOvdm	\N	2025-07-25 08:31:35	2025-07-25 08:31:35	\N
4436dc71-c40e-4028-8fb4-450ad6afea80	Umar Ahmad Djoyonegoro	umar-ahmad-djoyonegoro@example.com	\N	$2y$12$.yXOvpWbdSBY5xqTku9XyOVqEAK/V6bAeXBtciXiZhhvkTeRu8YEa	\N	2025-07-25 08:31:35	2025-07-25 08:31:35	\N
ff28cb1b-a345-4bb1-bcb7-87448e514e75	Nimas Ayu Alisya Putri	nimas-ayu-alisya-putri@example.com	\N	$2y$12$dmHB9XQpVrwQXHvNM4nd2ufltefNFaATNzSU9LiK5M6/WXxexViGS	\N	2025-07-25 08:31:35	2025-07-25 08:31:35	\N
6be6b9c5-6c78-4451-a28b-18dc678068a3	Azkiyah Syifana Althafunnisa	azkiyah-syifana-althafunnisa@example.com	\N	$2y$12$Ne16hBH31pVDj1wLiFhj.e6yskkVOBuc3s8uQXYDe6my22aKNDa7m	\N	2025-07-25 08:31:36	2025-07-25 08:31:36	\N
57f079a3-db5b-4d4e-9f4f-e0f95aa021dd	Kiki Aprelia	kiki@gmail.com	\N	$2y$12$GQ0AP6GQdxhnj/d7ZvYp9uyaVoNvhBZAboKHz8r6o21v3Mv36K6d6	\N	2025-08-07 01:30:38	2025-08-07 01:30:38	\N
57b5a065-99ec-42a1-88ea-bc54294f2fef	irma nurfuaida	irma@gmail.com	\N	$2y$12$5zOWIi.YX43C4DJJXOkt4OkKJkpSzcaDrHY.lbXol/DVVraqzgRVa	\N	2025-08-07 02:32:46	2025-08-07 02:32:46	\N
4439683a-0f96-4b8a-85d2-84c8ca520fd0	Mohammad Imran	imron46@gmail.com	\N	$2y$12$LDD6ej125zSjEmcgNgKVnu0igtLuJiv4/0mDM9LG8WYrf3FIXypSm	\N	2025-08-07 08:44:16	2025-08-07 08:44:16	\N
ea7d978c-6cc2-4937-a022-345343dd6289	nada nafisah	nada@gmal.com	\N	$2y$12$NmaPPbD3dXlxaaR5XtSC0uKhSC25OhE0DNY5MNDL2FlLRs0Omb9cy	\N	2025-08-05 07:15:01	2025-08-05 07:15:01	\N
cabf1c06-f522-41dc-8356-4ed5bff93fd8	Ratna Utari Dewi	dewi@example.com	\N	$2y$12$WtXAfjgbMaamzcGTpjPCxeyAh0bjeeNfAgHMJm2wYlUiysuU.qhQK	\N	2025-08-05 08:50:37	2025-08-05 08:50:37	\N
357601c9-bef8-4dd9-9085-edc37234c25f	Otaka Arya	arya@gmail.com	\N	$2y$12$3eVSHuywR9Ur4moWtvRC3.1YJxtLnhw8nfB7JU1tg.j1hoqenO5oG	\N	2025-08-13 13:03:15	2025-08-13 13:03:15	\N
eba0cb8d-f4ec-41fa-b500-1efed9882d3e	Tri Atarini	triatarini@gmail.com	\N	$2y$12$r13QFT1Qmb0BY6EPv5EzfeWWOhY3ck1gEs1l.T2F2Icv6d5GXW.Pi	\N	2025-08-06 01:27:09	2025-08-06 01:27:09	\N
961d4be4-c284-455a-896c-08795e258f6d	AHA Right Brain	adminpusat@gmail.com	\N	$2y$12$k0apQ65pbLYw.qJKCr6lfu5V0sQAfXd6EDbbTYK5rHntrTSfMc1b6	\N	2025-08-08 03:48:44	2025-08-08 04:15:57	\N
35d31909-372a-4648-bca2-49f160948657	Mohammad Imran	imron22@gmail.com	\N	$2y$12$SQDXAQBt9QWPHNg.jnqV8OzJRG73kkKooMZYVJLTEAdjDY0mgMvry	\N	2025-08-06 05:30:29	2025-08-06 05:30:29	\N
b2c2d4b6-d439-4e6c-a9d0-f0f3a3e51d5a	Mutia Azzahra	mutia@gmail.com	\N	$2y$12$iFP9nxNyn96f06i8gVHgreMypFBwnNSMdnBwqiy3yojfLfJBkFbbG	\N	2025-08-14 11:25:52	2025-08-14 11:25:52	\N
afacddc4-37f6-48e7-8b2a-7b9d86971a7f	Achmad Zulkifli Nur Rochim	ZULKIFLI@GMAIL.COM	\N	$2y$12$ZBi/2QcMC6Jf3sGz9BtTo.RY.GfTeTCaatgSfihDzKWjkFg7po1iC	\N	2025-08-14 11:30:29	2025-08-14 11:30:29	\N
cc04ad2c-c2d6-4755-a48a-46827e4be880	Salsa	salsa@gmail.com	\N	$2y$12$zj5kEkhkT4cFjNvdSNiaFOcGgZuWA6zJ/C2Jm8Nu4O4dQFhhi6HC2	\N	2025-08-14 11:33:24	2025-08-14 11:33:24	\N
a268dd3d-e868-4c0a-b70d-b3c8bfccf6f9	mohammad imron	imron123@gmail.com	\N	$2y$12$204eCPVpHoZmfeToSK9HrOhOe/tAjUM1rOc3.goDSAI4yH5xQaKOG	\N	2025-08-11 02:05:22	2025-08-11 02:05:22	\N
3cdc656e-15cd-45ee-b8cc-9d00562330ea	Iscandar Salim	salimmm@gmail.com	\N	$2y$12$XHXg/bbLjBJxW4KOQgObreiy4rogqdJIVLzToIie2vQAomoq7yk9y	\N	2025-08-12 01:34:11	2025-08-12 01:34:11	\N
\.


--
-- Name: employees employees_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.employees
    ADD CONSTRAINT employees_pkey PRIMARY KEY (id);


--
-- Name: license_holders license_holders_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.license_holders
    ADD CONSTRAINT license_holders_pkey PRIMARY KEY (id);


--
-- Name: users users_new_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_new_email_unique UNIQUE (email);


--
-- Name: users users_new_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_new_pkey PRIMARY KEY (id);


--
-- Name: employees employees_city_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.employees
    ADD CONSTRAINT employees_city_id_foreign FOREIGN KEY (city_id) REFERENCES public.cities(id) ON DELETE CASCADE;


--
-- Name: employees employees_district_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.employees
    ADD CONSTRAINT employees_district_id_foreign FOREIGN KEY (district_id) REFERENCES public.districts(id) ON DELETE CASCADE;


--
-- Name: employees employees_postal_code_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.employees
    ADD CONSTRAINT employees_postal_code_id_foreign FOREIGN KEY (postal_code_id) REFERENCES public.postal_codes(id) ON DELETE CASCADE;


--
-- Name: employees employees_province_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.employees
    ADD CONSTRAINT employees_province_id_foreign FOREIGN KEY (province_id) REFERENCES public.provinces(id) ON DELETE CASCADE;


--
-- Name: employees employees_religion_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.employees
    ADD CONSTRAINT employees_religion_id_foreign FOREIGN KEY (religion_id) REFERENCES public.religions(id) ON DELETE CASCADE;


--
-- Name: employees employees_sub_district_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.employees
    ADD CONSTRAINT employees_sub_district_id_foreign FOREIGN KEY (sub_district_id) REFERENCES public.sub_districts(id) ON DELETE CASCADE;


--
-- Name: employees employees_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.employees
    ADD CONSTRAINT employees_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- Name: license_holders license_holders_city_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.license_holders
    ADD CONSTRAINT license_holders_city_id_foreign FOREIGN KEY (city_id) REFERENCES public.cities(id) ON DELETE CASCADE;


--
-- Name: license_holders license_holders_district_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.license_holders
    ADD CONSTRAINT license_holders_district_id_foreign FOREIGN KEY (district_id) REFERENCES public.districts(id) ON DELETE CASCADE;


--
-- Name: license_holders license_holders_postal_code_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.license_holders
    ADD CONSTRAINT license_holders_postal_code_id_foreign FOREIGN KEY (postal_code_id) REFERENCES public.postal_codes(id) ON DELETE CASCADE;


--
-- Name: license_holders license_holders_province_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.license_holders
    ADD CONSTRAINT license_holders_province_id_foreign FOREIGN KEY (province_id) REFERENCES public.provinces(id) ON DELETE CASCADE;


--
-- Name: license_holders license_holders_religion_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.license_holders
    ADD CONSTRAINT license_holders_religion_id_foreign FOREIGN KEY (religion_id) REFERENCES public.religions(id) ON DELETE CASCADE;


--
-- Name: license_holders license_holders_sub_district_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.license_holders
    ADD CONSTRAINT license_holders_sub_district_id_foreign FOREIGN KEY (sub_district_id) REFERENCES public.sub_districts(id) ON DELETE CASCADE;


--
-- Name: license_holders license_holders_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.license_holders
    ADD CONSTRAINT license_holders_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE RESTRICT;


--
-- PostgreSQL database dump complete
--

