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
-- Name: licenses; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.licenses (
    id uuid NOT NULL,
    license_id character varying(255) NOT NULL,
    license_type character varying(2) NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    address text NOT NULL,
    province_id bigint,
    city_id bigint,
    district_id bigint,
    sub_district_id bigint,
    postal_code_id bigint,
    phone character varying(255) NOT NULL,
    join_date character varying(255),
    expired_date character varying(255),
    contract_agreement_number character varying(255),
    status character varying(10) NOT NULL,
    building_type smallint,
    building_status smallint,
    building_rent_expired_date character varying(10),
    building_area numeric(8,2),
    building_condition smallint,
    building_has_ac boolean,
    instagram character varying(255),
    facebook_page character varying(255),
    tiktok character varying(255),
    youtube character varying(255),
    google_maps character varying(255),
    landing_page_student_registration character varying(255),
    contract_document character varying(255),
    document_form character varying(255)
);


ALTER TABLE public.licenses OWNER TO postgres;

--
-- Data for Name: licenses; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.licenses (id, license_id, license_type, name, email, address, province_id, city_id, district_id, sub_district_id, postal_code_id, phone, join_date, expired_date, contract_agreement_number, status, building_type, building_status, building_rent_expired_date, building_area, building_condition, building_has_ac, instagram, facebook_page, tiktok, youtube, google_maps, landing_page_student_registration, contract_document, document_form) FROM stdin;
2e148f1f-8cb3-42a0-8c4c-6d9e6d631378	3534	LO	AHA Mojokerto	ahamojokerto@gmail.com	Jl. Kemas Setyoadi no. 258-259, Sambiroto	15	241	3534	44093	44093	6282191623188	2023-03-09	2028-03-09	19356/PL-MF/LSC/AHARBI/IX/22	active	2	1	\N	\N	1	f	\N	\N	\N	\N	\N	\N	contracts_aqad/k8HCpLLKhHEIfTDMh5idqayL5ElrrWiEsM5CxJGk.pdf	contracts_aqad/aDivGXuulXx68IGY7wbSUnZHpk4Y4bECD7gpUXCJ.pdf
faeea64d-432b-468f-9987-ead9f495705f	2534	LO	AHA Cimahi	drm_sinar@yahoo.com	Jl. Lurah No. 340/Y Cimahi, RT. 002 RW. 017 Kel. Karang Mekar Kec. Cimahi Tengah, Kota Cimahi, Jawa Barat	12	183	2534	30942	30942	6281382496827	2023-09-02	2028-09-02	19342/PL-MF/LSC/CV.AHA/II/22	active	\N	\N	\N	\N	\N	t	\N	\N	\N	\N	\N	\N	\N	\N
295b0890-62e2-436c-879b-d35f93123d9f	3253	LC	AHA Kalidawir	alifchoiriyah@gmail.com	ruko pasar domasan, desa domasan kec. kalidawir kab. tulungagung	15	229	3253	40758	40758	6281517216398	2023-02-06	2025-11-01	19359/PSM-LC/FO/AHARBI/VI/19	inactive	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
f23ba2b9-aeba-4aaa-9d02-d6374b049577	3701	LO	AHA Lamongan	ahalamongan@gmail.com	Jl. Made Mulyo No. 24, Lamongan - Jatim	15	249	3701	46555	46555	6285731366463	2019-01-04	2025-10-01	19327/PSM-MF/FO/AHARBI/IV/19	inactive	\N	\N	\N	\N	\N	\N	https://www.instagram.com/aha.rbs_lamongan?igsh=MWFndHB6NmVoNjV5cw==	https://www.facebook.com/aha.rbs.1	\N	\N	\N	\N	\N	\N
4aea5218-6550-4f97-abd0-ff65cf3eb8f0	1034	LC	AHA Bukit Raya	ahabukitraya@gmail.com	Perum. Arimbi Blok A no 8, Simpang Tiga, Bukit Raya, Pekanbaru Riau	4	86	1034	15186	15186	6285376942560	2021-03-11	2024-03-11	19345/PSM-LC/FO/AHARBI/XI/21	expired	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
82b0066e-b386-4dd6-b24c-d0a632e00f89	3478	LO	AHA Probolinggo	ahaprobolinggo@gmail.com	Jln. RA Kartini No. 23 Sidomukti, Kraksaan, Probolinggo	15	238	3478	43167	43167	6282324139199	2023-01-07	2028-01-07	19358/PL-MF/LSC/AHARBI/VII/23	active	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
c83e8351-7819-40bd-a799-4559159a72d7	3288	LC	AHA Udanawu	lcudanawu8@gmail.com	Dsn. Wonorejo RT 01 RW 01, Slemanan, Udanawu, Blitar (Lingkungan MIN 9 Blitar)	15	230	3288	41212	41212	6285648073423	2024-01-05	2026-12-05	19360/PSM-LC/FO/AHARBI/V/19	active	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
723a1878-0a01-4763-8517-58fb7202c478	3720	LC	AHA Cerme	aharightbrain@example.com	Jalan Raya Morowudi I RT 2 RW 1 kecamatan Cerme, Kabupaten Gresik	15	250	3720	46877	46877	628123141787	2024-03-08	2027-03-08	19318/PSM-MF/FO/AHARBI/VIII/18	active	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
24f6d448-82a4-4c55-a543-c7178956d9d3	3268	LO	AHA Blitar 2	ahablitar2@gmail.com	Lingk. Kedung Bunder RT/RW 02/03 Kel. Kedung Bunder Kec. Sutojayan - Blitar	15	230	3268	40980	40980	6285853728968	2024-04-02	2029-03-02	19352/PL-MF/LSC/CV.AHA/II/22	active	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
231e3cc0-9920-4707-817c-135f4d8da5d8	3700	LC	AHA Sukodadi 2	ahasukodadi@gmail.com	Dusun Sugihrejo Kecamatan Sukodadi Lamongan	15	249	3700	46536	46536	6285773373329	2024-02-05	2027-02-05	19349/PL-LC/LSC/CV.AHA/V/22	active	1	1	\N	\N	1	t	\N	\N	\N	\N	\N	\N	contracts_aqad/eDMZjtst9BOzA0BWIHGjOW1a4NBKfR8gnyGywnsB.pdf	contracts_aqad/ihegrreRGPSEU3tWD8VpIkkkhUxpVKW5IYm8YwyH.pdf
b0712df5-ea6d-4628-bb41-2dbb6b9d37d0	3582	LO	AHA Nganjuk 1	ahamfnganjuk1@gmail.com	Jl. Veteran No.2 Mangundikaran	15	243	3582	44817	44817	6282257607801	2023-03-02	2028-02-02	19365/PL-MF/LSC/AHARBI/II/23	active	\N	\N	\N	\N	\N	\N	https://www.instagram.com/aharbs_mfnganjuk?igsh=MTJwbTJnMTc0cm8zMQ==	https://www.facebook.com/profile.php?id=61572093593259&mibextid=rS40aB7S9Ucbxw6v	\N	\N	https://maps.app.goo.gl/ob5fU5GDp5bHoMyd8	\N	\N	\N
64be8af7-8094-49a1-9d9b-ab8f47842583	3272	LC	AHA Sutojayan	alifchoiriyah1@gmail.com	Lingkungan Kedungbunder RT 02 RW 03 Sutojayan Blitar	15	230	3272	41016	41016	6285853728968	2024-04-02	2027-03-02	19351/PL-LC/LSC/CV.AHA/II/22	active	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
d0779484-5b50-45d1-9e18-6016bc4efa94	2907	LO	AHA Kudus	Izzam_f4@yahoo.com	JL. KH. ARWANI NO.1 KRANDON KOTA KUDUS, JAWA TENGAH	13	204	2907	36589	36589	6281357334388	2023-09-02	2025-07-01	19341/PL-MF/LSC/CV.AHA/II/22	expired	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
6c9847f7-eaa3-4bd2-8fad-99ba1f0b8e08	3256	LC	AHA Ngunut	ahangunut@gmail.com	Desa Sumberingin Kidul, Kec. Ngunut, Kabupaten Tulungagung, Jawa Timur 66292	15	229	3256	40807	40807	085749121579	2022-11-07	2025-10-07	19355/PL-LC/LSC/AHARBI/VII/22	inactive	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	https://maps.app.goo.gl/XTQ3DZARGwP7U5zU9	\N	\N	\N
b748a124-0ba2-40c1-b890-f1866fbf3ad4	3860	LC	AHA Benowo	lcahabenowo@gmail.com	Benowo	15	262	3860	48532	48532	6282243312758	2027-04-02	2030-03-02	19348/PL-LC/LSC/CV.AHA/II/22	active	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
b3ebc3a7-3480-4415-8e8c-c90e5ee4ffde	3575	LO	AHA Nganjuk 2	prambonalief@gmail.com	Ds. Watudandang Kec. Prambon Kab. Nganjuk Jawa Timur	15	243	3575	44735	44735	6285859697977	2022-02-08	2027-02-08	19343/PL-MF/LSC/CV.AHA/VIII/20	active	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	contracts_aqad/OULZEq51jkfyw1hTzcMU6BaZ86X1gwNlyKj7GfeV.pdf	contracts_aqad/5miXopmemPFHGE4f4I4LTLGJ3v4ODmZjUUaR4Vuh.pdf
a92951d9-2612-4f86-85c6-08350c9efc3a	3284	LO	AHA Blitar	ahablitar@gmail.com	Dusun Tegalsari RT01/07 Kuntulan Kec. Sanankulon	15	230	3284	41153	41153	6281234567	2021-05-03	2026-04-03	19346/PL-MF/LSC/CV.AHA/III/20	active	1	1	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
c59d177b-bcb4-4294-9541-5042cc8cd9f3	3847	LC	AHA Tandes	vinawahidayanti@gmail.com	Jln. Manukan Tengah 9K No. 6 Surabaya	15	262	3847	48465	48465	6282333988994	2022-08-03	2025-07-03	19350/PL-LC/LSC/CV.AHA/III/22	expired	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
714d9599-abd4-4432-b09f-6f3d082ae79a	3248	LC	AHA Wonodadi	ahawonodadi@example.com	Dsn. Karangsono RT 02 RW 01 Desa Karangtalun Kec. Kalidawir	15	229	3248	40697	40697	6281234567	2022-03-03	2025-02-03	19353/PL-LC/LSC/CV.AHA/III/22	expired	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
bd0c1ffe-81a5-480a-82e5-d0142da14b51	3435	LO	AHA Bondowoso	aha.mfbondowoso@gmail.com	JL. Brigpol Sudarlan 41 Bondowoso	15	236	3435	42724	42724	6285258882884	2024-03-11	2029-03-11	19364/PSM-MF/FO/AHARBI/XI/18	active	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
da1bc76b-a7ea-4383-9e29-3ad4275abcd6	3399	LC	AHA Patrang	ahalcpatrang.ta@gmail.com	Patrang	15	234	3399	42395	42395	6281234567	2015-01-01	2030-12-31	-	active	3	2	2030-02-20	100.00	1	f	\N	\N	\N	\N	\N	\N	\N	\N
fd384cca-8b44-4b22-9e7e-982e007a0a2b	3291	LO	AHA Kediri	hurishania@gmail.com	Jl. Gajah Mada 303 Dsn. Sawahan Ds. Purwokerto RT 02/RW 02 Kec. Ngadiluwih Kab. Kediri JATIM	15	231	3291	41252	41252	6285607200505	2024-09-01	2029-09-01	19357/PL-MF/LSC/AHARBI/I/23	active	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
80f73f1e-cf06-45f3-9355-e8ef2549616c	3280	LC	AHA Wlingi	niarinamis@gmail.com	Jln. Bunaken No. 27 Karangtengah Kota Blitar	15	230	3280	41107	41107	6281556761455	2022-09-05	2025-09-05	19363/PSM-LC/FO/AHARBI/V/19	inactive	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
2085d0af-436d-4e14-bef7-051613157fe3	3397	LC	AHA Kaliwates	lcahakaliwates@gmail.com	Ruko Grand Tegal Besar Blok A1, Jalan Moh. Yamin, Tegal Besar, Jember, 68131	15	234	3397	42382	42382	6285122391669	2022-09-20	2026-09-20	asnjsacx	active	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	contracts/BhqeZzEUABQPY3Ruluq5pVO7aMA3xThs86pGfgM5.pdf	contracts/d08LDGcYGzpPwjJ3FCa5vs5FXo1XOYPbyOeZD30B.pdf
0037383b-576c-458c-bc4e-b0b5dfdf8d87	0000	FO	AHA Right Brain	aharightbrain@gmail.com	Ruko Grand Tegal Besar, Jalan Moh. Yamin, Tegal Besar, Kaliwates, Kab. Jember, Jawa Timur 68131	\N	\N	\N	\N	\N	6285122391669	\N	\N	\N	active	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N
9888184e-2449-44d1-b32c-e5fe1897d917	3258	LC	AHA Boyolangu	ahalcboyolangu.ta@gmail.com	Dsn. Kalituri, RT 2 RW 3, Ds. Waung, Kec. Boyolangu, Kab. Tulungagung	15	229	3258	40837	40837	6282232262757	2024-12-02	2027-11-02	19362/PL-LC/LSC/AHARBI/X/23	active	2	1	\N	\N	1	\N	https://www.instagram.com/ahalcboyolangu.ta?igsh=MTFsZGlkdWdneWx6ZQ==	https://www.facebook.com/pondokilmu.ahalcboyolangu?mibextid=ZbWKwL	https://www.tiktok.com/@aharightbrain.boyolangu	\N	https://g.co/kgs/Vpeyym3	\N	contracts_aqad/8YKaR5rWgkRMLzu1OrjyADWObcjyQDDepqhCmYzF.pdf	\N
68728741-6660-45a2-818d-856841872086	3259	LO	AHA Tulungagung	aharbstulungagung@gmail.com	JL. MT Haryono V/14C	15	229	3259	40857	40857	6285646416333	2021-07-10	2026-07-10	19347/PL-MF/LSC/CV.AHA/X/21	active	1	1	\N	\N	1	f	https://www.instagram.com/aharightbrain.tulungagung/	https://www.facebook.com/share/1GpshEu8HA/	https://www.tiktok.com/@aharbstulungagung?_t=ZS-8vymh9SYP9c&_r=1	\N	https://maps.app.goo.gl/5pmZN5Vgw4kznrHs5	https://docs.google.com/forms/d/e/1FAIpQLScLzBqaFKKFGIXMrYjfePwtDL88ro9DNWSZhAbWcmsLw8ZZBw/viewform	\N	\N
\.


--
-- Name: licenses licenses_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.licenses
    ADD CONSTRAINT licenses_pkey PRIMARY KEY (id);


--
-- Name: licenses licenses_city_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.licenses
    ADD CONSTRAINT licenses_city_id_foreign FOREIGN KEY (city_id) REFERENCES public.cities(id) ON DELETE CASCADE;


--
-- Name: licenses licenses_district_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.licenses
    ADD CONSTRAINT licenses_district_id_foreign FOREIGN KEY (district_id) REFERENCES public.districts(id) ON DELETE CASCADE;


--
-- Name: licenses licenses_postal_code_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.licenses
    ADD CONSTRAINT licenses_postal_code_id_foreign FOREIGN KEY (postal_code_id) REFERENCES public.postal_codes(id) ON DELETE CASCADE;


--
-- Name: licenses licenses_province_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.licenses
    ADD CONSTRAINT licenses_province_id_foreign FOREIGN KEY (province_id) REFERENCES public.provinces(id) ON DELETE CASCADE;


--
-- Name: licenses licenses_sub_district_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.licenses
    ADD CONSTRAINT licenses_sub_district_id_foreign FOREIGN KEY (sub_district_id) REFERENCES public.sub_districts(id) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

