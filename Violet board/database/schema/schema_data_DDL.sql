--
-- PostgreSQL database dump
--

-- Dumped from database version 17.3
-- Dumped by pg_dump version 17.3

-- Started on 2025-05-10 18:29:10

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
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
-- TOC entry 217 (class 1259 OID 23536)
-- Name: box_collect_locations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.box_collect_locations (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    address character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.box_collect_locations OWNER TO postgres;

--
-- TOC entry 218 (class 1259 OID 23541)
-- Name: box_collect_locations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.box_collect_locations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.box_collect_locations_id_seq OWNER TO postgres;

--
-- TOC entry 5063 (class 0 OID 0)
-- Dependencies: 218
-- Name: box_collect_locations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.box_collect_locations_id_seq OWNED BY public.box_collect_locations.id;


--
-- TOC entry 219 (class 1259 OID 23542)
-- Name: cache; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cache (
    key character varying(255) NOT NULL,
    value text NOT NULL,
    expiration integer NOT NULL
);


ALTER TABLE public.cache OWNER TO postgres;

--
-- TOC entry 220 (class 1259 OID 23547)
-- Name: cache_locks; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cache_locks (
    key character varying(255) NOT NULL,
    owner character varying(255) NOT NULL,
    expiration integer NOT NULL
);


ALTER TABLE public.cache_locks OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 23552)
-- Name: carts; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.carts (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    items json NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.carts OWNER TO postgres;

--
-- TOC entry 222 (class 1259 OID 23557)
-- Name: carts_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.carts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.carts_id_seq OWNER TO postgres;

--
-- TOC entry 5064 (class 0 OID 0)
-- Dependencies: 222
-- Name: carts_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.carts_id_seq OWNED BY public.carts.id;


--
-- TOC entry 223 (class 1259 OID 23558)
-- Name: categories; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categories (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    slug character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.categories OWNER TO postgres;

--
-- TOC entry 224 (class 1259 OID 23563)
-- Name: categories_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.categories_id_seq OWNER TO postgres;

--
-- TOC entry 5065 (class 0 OID 0)
-- Dependencies: 224
-- Name: categories_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.categories_id_seq OWNED BY public.categories.id;


--
-- TOC entry 225 (class 1259 OID 23564)
-- Name: category_product; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.category_product (
    id bigint NOT NULL,
    product_id bigint NOT NULL,
    category_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.category_product OWNER TO postgres;

--
-- TOC entry 226 (class 1259 OID 23567)
-- Name: category_product_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.category_product_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.category_product_id_seq OWNER TO postgres;

--
-- TOC entry 5066 (class 0 OID 0)
-- Dependencies: 226
-- Name: category_product_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.category_product_id_seq OWNED BY public.category_product.id;


--
-- TOC entry 227 (class 1259 OID 23568)
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO postgres;

--
-- TOC entry 228 (class 1259 OID 23574)
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.failed_jobs_id_seq OWNER TO postgres;

--
-- TOC entry 5067 (class 0 OID 0)
-- Dependencies: 228
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- TOC entry 229 (class 1259 OID 23575)
-- Name: job_batches; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.job_batches (
    id character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    total_jobs integer NOT NULL,
    pending_jobs integer NOT NULL,
    failed_jobs integer NOT NULL,
    failed_job_ids text NOT NULL,
    options text,
    cancelled_at integer,
    created_at integer NOT NULL,
    finished_at integer
);


ALTER TABLE public.job_batches OWNER TO postgres;

--
-- TOC entry 230 (class 1259 OID 23580)
-- Name: jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.jobs (
    id bigint NOT NULL,
    queue character varying(255) NOT NULL,
    payload text NOT NULL,
    attempts smallint NOT NULL,
    reserved_at integer,
    available_at integer NOT NULL,
    created_at integer NOT NULL
);


ALTER TABLE public.jobs OWNER TO postgres;

--
-- TOC entry 231 (class 1259 OID 23585)
-- Name: jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.jobs_id_seq OWNER TO postgres;

--
-- TOC entry 5068 (class 0 OID 0)
-- Dependencies: 231
-- Name: jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.jobs_id_seq OWNED BY public.jobs.id;


--
-- TOC entry 232 (class 1259 OID 23586)
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- TOC entry 233 (class 1259 OID 23589)
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.migrations_id_seq OWNER TO postgres;

--
-- TOC entry 5069 (class 0 OID 0)
-- Dependencies: 233
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- TOC entry 234 (class 1259 OID 23590)
-- Name: order_products; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.order_products (
    id bigint NOT NULL,
    order_id bigint NOT NULL,
    product_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    price numeric(8,2) NOT NULL,
    quantity integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.order_products OWNER TO postgres;

--
-- TOC entry 235 (class 1259 OID 23593)
-- Name: order_products_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.order_products_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.order_products_id_seq OWNER TO postgres;

--
-- TOC entry 5070 (class 0 OID 0)
-- Dependencies: 235
-- Name: order_products_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.order_products_id_seq OWNED BY public.order_products.id;


--
-- TOC entry 236 (class 1259 OID 23594)
-- Name: orders; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.orders (
    id bigint NOT NULL,
    full_name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    phone character varying(255) NOT NULL,
    address character varying(255) NOT NULL,
    delivery_method character varying(255) NOT NULL,
    payment_method character varying(255) NOT NULL,
    total_price numeric(8,2) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.orders OWNER TO postgres;

--
-- TOC entry 237 (class 1259 OID 23599)
-- Name: orders_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.orders_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.orders_id_seq OWNER TO postgres;

--
-- TOC entry 5071 (class 0 OID 0)
-- Dependencies: 237
-- Name: orders_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.orders_id_seq OWNED BY public.orders.id;


--
-- TOC entry 238 (class 1259 OID 23600)
-- Name: password_reset_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_reset_tokens OWNER TO postgres;

--
-- TOC entry 239 (class 1259 OID 23605)
-- Name: product_images; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.product_images (
    id bigint NOT NULL,
    product_id bigint NOT NULL,
    filename character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.product_images OWNER TO postgres;

--
-- TOC entry 240 (class 1259 OID 23608)
-- Name: product_images_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.product_images_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.product_images_id_seq OWNER TO postgres;

--
-- TOC entry 5072 (class 0 OID 0)
-- Dependencies: 240
-- Name: product_images_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.product_images_id_seq OWNED BY public.product_images.id;


--
-- TOC entry 241 (class 1259 OID 23609)
-- Name: products; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.products (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    description text,
    price numeric(8,2) NOT NULL,
    min_age integer NOT NULL,
    min_players integer NOT NULL,
    max_players integer NOT NULL,
    is_new boolean DEFAULT false NOT NULL,
    is_best_seller boolean DEFAULT false NOT NULL,
    is_discounted boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    is_favorite boolean DEFAULT false NOT NULL,
    discounted_price numeric(8,2)
);


ALTER TABLE public.products OWNER TO postgres;

--
-- TOC entry 242 (class 1259 OID 23618)
-- Name: products_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.products_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.products_id_seq OWNER TO postgres;

--
-- TOC entry 5073 (class 0 OID 0)
-- Dependencies: 242
-- Name: products_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.products_id_seq OWNED BY public.products.id;


--
-- TOC entry 243 (class 1259 OID 23619)
-- Name: sessions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sessions (
    id character varying(255) NOT NULL,
    user_id bigint,
    ip_address character varying(45),
    user_agent text,
    payload text NOT NULL,
    last_activity integer NOT NULL
);


ALTER TABLE public.sessions OWNER TO postgres;

--
-- TOC entry 244 (class 1259 OID 23624)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 245 (class 1259 OID 23629)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_seq OWNER TO postgres;

--
-- TOC entry 5074 (class 0 OID 0)
-- Dependencies: 245
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 4817 (class 2604 OID 23630)
-- Name: box_collect_locations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.box_collect_locations ALTER COLUMN id SET DEFAULT nextval('public.box_collect_locations_id_seq'::regclass);


--
-- TOC entry 4818 (class 2604 OID 23631)
-- Name: carts id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.carts ALTER COLUMN id SET DEFAULT nextval('public.carts_id_seq'::regclass);


--
-- TOC entry 4819 (class 2604 OID 23632)
-- Name: categories id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories ALTER COLUMN id SET DEFAULT nextval('public.categories_id_seq'::regclass);


--
-- TOC entry 4820 (class 2604 OID 23633)
-- Name: category_product id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.category_product ALTER COLUMN id SET DEFAULT nextval('public.category_product_id_seq'::regclass);


--
-- TOC entry 4821 (class 2604 OID 23634)
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- TOC entry 4823 (class 2604 OID 23635)
-- Name: jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jobs ALTER COLUMN id SET DEFAULT nextval('public.jobs_id_seq'::regclass);


--
-- TOC entry 4824 (class 2604 OID 23636)
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- TOC entry 4825 (class 2604 OID 23637)
-- Name: order_products id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.order_products ALTER COLUMN id SET DEFAULT nextval('public.order_products_id_seq'::regclass);


--
-- TOC entry 4826 (class 2604 OID 23638)
-- Name: orders id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders ALTER COLUMN id SET DEFAULT nextval('public.orders_id_seq'::regclass);


--
-- TOC entry 4827 (class 2604 OID 23639)
-- Name: product_images id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product_images ALTER COLUMN id SET DEFAULT nextval('public.product_images_id_seq'::regclass);


--
-- TOC entry 4828 (class 2604 OID 23640)
-- Name: products id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products ALTER COLUMN id SET DEFAULT nextval('public.products_id_seq'::regclass);


--
-- TOC entry 4833 (class 2604 OID 23641)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 5029 (class 0 OID 23536)
-- Dependencies: 217
-- Data for Name: box_collect_locations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.box_collect_locations (id, name, address, created_at, updated_at) FROM stdin;
1	Bratislava - Avion	Ivanská cesta 16, 821 04 Bratislava	2025-05-10 16:09:30	2025-05-10 16:09:30
2	Košice - Aupark	Námestie osloboditeľov 1, 040 01 Košice	2025-05-10 16:09:30	2025-05-10 16:09:30
3	Žilina - OC Mirage	Námestie A. Hlinku 7B, 010 01 Žilina	2025-05-10 16:09:30	2025-05-10 16:09:30
4	Kopčany	Kollárova, 90848 Kopčany	2025-05-10 16:09:30	2025-05-10 16:09:30
5	Skalica - Farby-Laky	Mallého 1218/14, 90901 Skalica	2025-05-10 16:09:30	2025-05-10 16:09:30
6	Malacky - Záhorácka	Záhorácka 53, 90101 Malacky	2025-05-10 16:09:30	2025-05-10 16:09:30
7	Zohor	Struhárova ulica 2, 90051 Zohor	2025-05-10 16:09:30	2025-05-10 16:09:30
8	Smolenice	Trnavská 584/12, 91904	2025-05-10 16:09:30	2025-05-10 16:09:30
9	Diakovce	459, 92581 Diakovce	2025-05-10 16:09:30	2025-05-10 16:09:30
10	Komárno	Hadovská cesta 3913, 94501 Komárno	2025-05-10 16:09:31	2025-05-10 16:09:31
\.


--
-- TOC entry 5031 (class 0 OID 23542)
-- Dependencies: 219
-- Data for Name: cache; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cache (key, value, expiration) FROM stdin;
\.


--
-- TOC entry 5032 (class 0 OID 23547)
-- Dependencies: 220
-- Data for Name: cache_locks; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cache_locks (key, owner, expiration) FROM stdin;
\.


--
-- TOC entry 5033 (class 0 OID 23552)
-- Dependencies: 221
-- Data for Name: carts; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.carts (id, user_id, items, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 5035 (class 0 OID 23558)
-- Dependencies: 223
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.categories (id, name, slug, created_at, updated_at) FROM stdin;
1	Štrategické hry	strategia	2025-05-10 16:09:30	2025-05-10 16:09:30
2	Puzzle	puzzle	2025-05-10 16:09:30	2025-05-10 16:09:30
3	Party hry	party	2025-05-10 16:09:30	2025-05-10 16:09:30
4	Vedomostné hry	vedomostne	2025-05-10 16:09:30	2025-05-10 16:09:30
5	Kartové hry	karty	2025-05-10 16:09:30	2025-05-10 16:09:30
6	Rodinné hry	rodinne	2025-05-10 16:09:30	2025-05-10 16:09:30
7	Pre deti	deti	2025-05-10 16:09:30	2025-05-10 16:09:30
8	Pamäťové hry	pamat	2025-05-10 16:09:30	2025-05-10 16:09:30
\.


--
-- TOC entry 5037 (class 0 OID 23564)
-- Dependencies: 225
-- Data for Name: category_product; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.category_product (id, product_id, category_id, created_at, updated_at) FROM stdin;
1	1	6	\N	\N
2	1	3	\N	\N
3	2	6	\N	\N
4	2	5	\N	\N
5	2	3	\N	\N
6	3	5	\N	\N
7	3	6	\N	\N
8	3	3	\N	\N
9	4	4	\N	\N
10	4	7	\N	\N
11	4	6	\N	\N
12	5	1	\N	\N
13	5	6	\N	\N
14	5	5	\N	\N
15	6	6	\N	\N
16	6	1	\N	\N
17	6	7	\N	\N
18	7	6	\N	\N
19	7	8	\N	\N
20	7	4	\N	\N
21	8	6	\N	\N
22	8	4	\N	\N
23	8	3	\N	\N
24	9	6	\N	\N
25	9	3	\N	\N
26	10	6	\N	\N
27	10	5	\N	\N
28	10	7	\N	\N
29	11	1	\N	\N
30	12	3	\N	\N
31	12	5	\N	\N
32	13	7	\N	\N
33	13	2	\N	\N
34	14	1	\N	\N
35	14	7	\N	\N
36	15	3	\N	\N
37	15	6	\N	\N
38	16	5	\N	\N
39	16	3	\N	\N
40	17	1	\N	\N
41	17	6	\N	\N
42	18	4	\N	\N
43	18	7	\N	\N
44	18	8	\N	\N
45	19	2	\N	\N
46	20	2	\N	\N
47	21	5	\N	\N
48	21	3	\N	\N
49	22	6	\N	\N
50	23	5	\N	\N
51	23	1	\N	\N
52	23	3	\N	\N
53	24	5	\N	\N
\.


--
-- TOC entry 5039 (class 0 OID 23568)
-- Dependencies: 227
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- TOC entry 5041 (class 0 OID 23575)
-- Dependencies: 229
-- Data for Name: job_batches; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.job_batches (id, name, total_jobs, pending_jobs, failed_jobs, failed_job_ids, options, cancelled_at, created_at, finished_at) FROM stdin;
\.


--
-- TOC entry 5042 (class 0 OID 23580)
-- Dependencies: 230
-- Data for Name: jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.jobs (id, queue, payload, attempts, reserved_at, available_at, created_at) FROM stdin;
\.


--
-- TOC entry 5044 (class 0 OID 23586)
-- Dependencies: 232
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	0001_01_01_000000_create_users_table	1
2	0001_01_01_000001_create_cache_table	1
3	0001_01_01_000002_create_jobs_table	1
4	2025_04_22_175551_create_products_table	1
5	2025_04_22_205349_create_product_images_table	1
6	2025_04_23_170135_add_is_favorite_to_products_table	1
7	2025_04_23_190555_create_box_collect_locations_table	1
8	2025_04_23_223655_create_carts_table	1
9	2025_04_23_232911_add_discounted_price_to_products_table	1
10	2025_04_24_125139_create_categories_table	1
11	2025_04_24_125740_create_category_product_table	1
12	2025_04_24_135331_add_slug_unique_to_categories	1
13	2025_04_24_191530_create_orders_table	1
14	2025_04_24_191622_create_order_products_table	1
\.


--
-- TOC entry 5046 (class 0 OID 23590)
-- Dependencies: 234
-- Data for Name: order_products; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.order_products (id, order_id, product_id, name, price, quantity, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 5048 (class 0 OID 23594)
-- Dependencies: 236
-- Data for Name: orders; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.orders (id, full_name, email, phone, address, delivery_method, payment_method, total_price, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 5050 (class 0 OID 23600)
-- Dependencies: 238
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
\.


--
-- TOC entry 5051 (class 0 OID 23605)
-- Dependencies: 239
-- Data for Name: product_images; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.product_images (id, product_id, filename, created_at, updated_at) FROM stdin;
1	1	activity1.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
2	1	activity2.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
3	2	bang1.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
4	2	bang2.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
5	3	blafuj1.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
6	3	blafuj2.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
7	4	brainbox-abc1.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
8	4	brainbox-abc2.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
9	5	citadela1.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
10	5	citadela2.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
11	6	clovece1.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
12	6	clovece2.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
13	7	cortex1.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
14	7	cortex2.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
15	8	desiatka1.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
16	8	desiatka2.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
17	9	dixit1.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
18	9	dixit2.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
19	10	dobble1.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
20	10	dobble2.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
21	11	domino1.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
22	11	domino2.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
23	12	exploding-kittens1.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
24	12	exploding-kittens2.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
25	13	fabio1.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
26	13	fabio2.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
27	14	iq-link1.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
28	14	iq-link2.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
29	15	jenga1.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
30	15	jenga2.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
31	16	meme1.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
32	16	meme2.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
33	17	monopoly1.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
34	17	monopoly2.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
35	18	pexesohm1.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
36	18	pexesohm2.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
37	19	puzzle-kvet1.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
38	19	puzzle-kvet2.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
39	20	puzzle-lalia1.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
40	20	puzzle-lalia2.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
41	21	saboter1.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
42	21	saboter2.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
43	22	scrabble1.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
44	22	scrabble2.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
45	23	tury-mury1.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
46	23	tury-mury2.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
47	24	uno-deluxe1.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
48	24	uno-deluxe2.jpg	2025-05-10 16:09:31	2025-05-10 16:09:31
\.


--
-- TOC entry 5053 (class 0 OID 23609)
-- Dependencies: 241
-- Data for Name: products; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.products (id, name, description, price, min_age, min_players, max_players, is_new, is_best_seller, is_discounted, created_at, updated_at, is_favorite, discounted_price) FROM stdin;
1	Activity	<p><strong>Activity Original</strong> – kreatívna zábava pre celú rodinu!</p>\r\n            <ul>\r\n                <li>2 640 nových pojmov</li>\r\n                <li>Vysvetľovanie: kreslenie, opis, pantomíma</li>\r\n                <li>Pre 3–16 hráčov od 12 rokov</li>\r\n                <li>Dĺžka hry: 60 min</li>\r\n            </ul>	23.90	12	3	16	f	f	t	2025-05-10 16:09:31	2025-05-10 16:09:31	f	19.90
2	Bang	\r\n                <p><strong>Bang!</strong> – Divoká západná kartová jazda!</p>\r\n                <p>Naháňačka na Divokom západe začína! Šerif, banditi, odpadlík a pomocníci – každý má svoju skrytú úlohu. Cieľ? Šerif prežije, banditi ho zabijú, odpadlík vyhrá sám!</p>\r\n                <ul>\r\n                    <li><strong>Tajné identity</strong> – nikto nevie, kto je kto</li>\r\n                    <li><strong>Dynamické súboje</strong> – vystrieľajte súperov dávkou kariet</li>\r\n                    <li><strong>Strategické rozhodnutia</strong> – kedy útočiť a kedy sa brániť?</li>\r\n                </ul>\r\n                <p>V balení nájdete: 110 kariet a pravidlá v slovenčine/češtine.</p>\r\n                <p><em>Pre 4–7 hráčov od 10 rokov. Dĺžka hry: 20 – 40 min.</em></p>\r\n            	20.99	10	4	7	f	t	f	2025-05-10 16:09:31	2025-05-10 16:09:31	f	\N
3	Blafuj	\r\n                    <p><strong>Oblafni priateľov zo svojej party,</strong><br>\r\n                    jasnú šancu vyhrať máš.<br>\r\n                    No ak sa ti stanú štyri zhodné karty,<br>\r\n                    namiesto výhry - prehrávaš!</p>\r\n                    <p>Blafovacia kartová hra s obrázkami zvieratiek, ktoré nemá (skoro) nikto rád.</p>\r\n                    <p><strong>Obsah hry:</strong> 64 hracích kariet (s ôsmymi rôznymi druhmi zvieratiek), pravidlá.</p>\r\n                    <p><em>Ideálna pre 2–6 hráčov od 8 rokov. Dĺžka hry: 30 min.</em></p>\r\n                	10.00	8	2	6	t	f	f	2025-05-10 16:09:31	2025-05-10 16:09:31	f	\N
4	Brainbox abc	\r\n                <p>Táto vzdelávacia hra precvičí detskú pamäť a pozorovacie schopnosti zábavnou formou. Cieľ? Za 10 minút získať čo najviac kariet správnym zodpovedaním otázok.</p>\r\n                <p>Deti sa učia:</p>\r\n                <ul>\r\n                    <li>Rozpoznávať písmená</li>\r\n                    <li>Základy čítania</li>\r\n                    <li>Fonetiku podľa školských osnov</li>\r\n                </ul>\r\n                <p>Jednoduché pravidlá – stačí pozorne sledovať obrázky na kartách a odpovedať.</p>\r\n                <p><strong>Balenie obsahuje:</strong> 55 kariet, presýpacie hodiny, kocku a pravidlá.</p>\r\n                <p><em>Ideálne pre deti od 4 rokov!</em></p>\r\n            	17.99	4	1	6	f	t	f	2025-05-10 16:09:31	2025-05-10 16:09:31	f	\N
5	Citadela	\r\n                <p>V tejto taktickej hre pre 2–8 hráčov (od 10 rokov) budujete najhodnotnejšie mesto pomocou unikátnych postáv.</p>\r\n                <p>Každé kolo si <strong>tajne vyberáte postavu</strong> so špeciálnou schopnosťou, ktorá určuje poradie ťahov a možnosti akcií.</p>\r\n                <p>Hra končí, keď niekto postaví 7–8 budov, potom sa hodnotia body za budovy a bonusy.</p>\r\n                <p><strong>Balenie obsahuje:</strong><br>\r\n                27 kariet postáv, 87 kariet budov, drevené mince a korunu.</p>\r\n                <p><em>Dĺžka hry: 30 – 60 min.</em></p>\r\n            	17.89	10	2	8	t	f	f	2025-05-10 16:09:31	2025-05-10 16:09:31	f	\N
6	Človeče	\r\n                <p><strong>Človeče, nehnevaj sa</strong> – klasika plná napätia!</p>\r\n                <p>Táto legendárna hra pre 2–4 hráčov rozvíja stratégie aj nervy. Cieľ? Presunúť všetky 4 figúrky z domčeka na finálové políčko.</p>\r\n                <p>Jednoduché pravidlá skrývajú drsné súboje – <strong>súpera môžete vyhodiť</strong> a poslať ho na začiatok!</p>\r\n                <p><strong>Hra vhodná pre celú rodinu (od 6 rokov)</strong> prináša: herný plán, 16 farebných figúrok, hraciu kocku.</p>\r\n                <p><em>Zabaví na dovolenkách, chate aj doma. Pozor – dokáže odhaliť pravú povahu hráčov!</em></p>\r\n            	6.99	6	2	4	f	f	t	2025-05-10 16:09:31	2025-05-10 16:09:31	f	5.99
7	Cortex	\r\n                <p><strong>Cortex 2</strong> – Šialený tréning pre váš mozog!</p>\r\n                <p>Táto dynamická hra testuje 8 rôznych schopností: od logiky po hmatové vnímanie. Hráči <strong>súperia v rýchlosti</strong>, riešiac rozmanité úlohy pod časovým tlakom.</p>\r\n                <p><strong>Hlavné črty:</strong><br>\r\n                • 8 typov výziev (pamäť, postreh, hmat atď.)<br>\r\n                • Kompatibilita s prvým Cortexom<br>\r\n                • Cieľ: ako prvý zložiť 4 dielky mozgu</p>\r\n                <p><em>Ideálna pre 2–6 hráčov od 8 rokov, ktorí sa chcú zabaviť a potrápiť myšlienkové pochody!</em></p>\r\n            	14.99	8	2	6	f	t	f	2025-05-10 16:09:31	2025-05-10 16:09:31	f	\N
8	Desiatka	\r\n                <p><strong>Desiatka</strong> – Hra, kde čakanie neexistuje!</p>\r\n                <p>Táto inovatívna hra odstraňuje nudné čakanie na ťah – všetci hráči <strong>súčasne hádajú odpovede</strong> na 10 otázok z každého okruhu. Za správne odpovede získavate žetóny, no môžete aj riskovať: hľadať ďalšie odpovede a získať viac bodov, alebo <em>prísť o už získané</em>.</p>\r\n                <p><strong>Obsah hry:</strong><br>\r\n                • 200 rôznych okruhov (2000 otázok)<br>\r\n                • Kompaktný smartbox ideálny na cesty<br>\r\n                • 100 obojstranných kariet a 10 žetónov</p>\r\n                <p><em>Perfektná pre 2–6 hráčov od 10 rokov, ktorí chcú vzdelávanie spojené so vzrušením a strategiou!</em></p>\r\n                <p>Dĺžka hry: 20 min.</p>\r\n            	20.50	10	2	6	t	f	f	2025-05-10 16:09:31	2025-05-10 16:09:31	f	\N
9	Dixit	\r\n                <p><strong>Dixit</strong> – Kúzlo predstavivosti!</p>\r\n                <p>Geniálne jednoduchá hra, kde 84 krásnych ilustrácií ožíva vašou fantáziou. <strong>Rozprávač</strong> popíše kartu vlastnými slovami, ostatní vyberajú zo svojich tú najvhodnejšiu. Zamiešané karty sa odhalia a všetci hádajú pôvodnú.</p>\r\n                <p>Dokonalá balancia medzi kreativitou a taktikou – príliš očividný opis neprinesie body. Hra rozvíja predstavivosť a vzájomné porozumenie.</p>\r\n                <p><em>Ideálna pre 3–8 hráčov od 8 rokov. V balení nájdete karty, drevené figúrky, hraciu dosku a pravidlá. Dixit je viac než hra – je to spoločenský zážitok plný prekvapení!</em></p>\r\n                <p>Dĺžka hry: 30 min.</p>\r\n            	19.99	8	3	8	f	t	f	2025-05-10 16:09:31	2025-05-10 16:09:31	f	\N
10	Dobble	\r\n                <p><strong>Dobble</strong> – Šialená hra rýchlosti a postrehu!</p>\r\n                <p>5 hier v jednej s jednoduchým princípom: <strong>nájsť spoločný symbol na kartách</strong>. Každé dve karty majú len jeden zhodný obrázok!</p>\r\n                <p><strong>Výhody hry:</strong><br>\r\n                • 55 kruhových kariet s 50 symbolmi<br>\r\n                • 5 rôznych herných variantov<br>\r\n                • Okamžité pochopenie pravidiel<br>\r\n                • Vhodné pre deti aj dospelých</p>\r\n                <p>Hra rozvíja reflexy, postreh a zabaví celú rodinu. Uložené v praktickej plechovej krabičke.</p>\r\n                <p><em>Perfektná pre 2–8 hráčov od 6 rokov.</em></p>\r\n                <p>Dĺžka hry: 10 min.</p>\r\n            	6.50	6	2	8	t	f	f	2025-05-10 16:09:31	2025-05-10 16:09:31	f	\N
11	Domino	\r\n                <p><strong>Domino</strong> – Klasická stratégia s číselnými kameňmi!</p>\r\n                <p>Hra pre 2–4 hráčov od 6 rokov, kde spojíte rovnaké čísla na kameňoch. Cieľ? Zbaviť sa všetkých kameňov ako prvý alebo získať najviac bodov.</p>\r\n                <p>Balenie obsahuje 28 obojstranných kameňov.</p>\r\n                <p><em>Dĺžka hry: 15 min.</em></p>\r\n            	4.99	6	2	4	f	f	t	2025-05-10 16:09:31	2025-05-10 16:09:31	f	3.99
12	Exploding Kittens	\r\n                <p><strong>Exploding Kittens: Dobro vs. Zlo</strong> – kde mačky a výbuchy spájajú zábavu s nevypočitateľným chaosom!</p>\r\n                <p>V tejto šialenej kartovej hre sa ocitnete v stredu večného súboja medzi dobrom a zlom. Cieľ je jednoduchý: prežiť! Postupne ťaháte karty z balíčka, no varujte sa – ak narazíte na Výbušnú mačku, končíte! Našťastie máte k dispozícii záchranné karty ako Odklápač alebo Laserové ukazovátko, ktoré vás môžu zachrániť. Ale pozor, súperi vám môžu výbuch podsunúť späť!</p>\r\n                <p>V pevnej škatuľke nájdete všetko pre okamžité začatie hry: 55 kariet (vrátane exkluzívnych Armageddon kariet), hernú podložku a podrobné pravidlá.</p>\r\n                <p><em>Ideálne pre 2–5 hráčov od 7 rokov.</em></p>\r\n                <p><em>Dĺžka hry: 15 min.</em></p>\r\n            	24.99	7	2	5	f	t	f	2025-05-10 16:09:31	2025-05-10 16:09:31	f	\N
13	Fabio	\r\n                <p><strong>Žaba - trojvrstvové puzzle</strong> rozpráva vývojový príbeh žabky: od vajíčka cez mláďa po dospelú žabu. Každá vrstva zobrazuje inú životnú fázu v tom istom prostredí.</p>\r\n                <p>Tieto originálne trojvrstvové puzzle sú ideálne pre deti (3+), ktoré radi skladajú a učia sa prírodovedné zákonitosti!</p>\r\n            	9.50	3	1	1	t	f	f	2025-05-10 16:09:31	2025-05-10 16:09:31	f	\N
14	Iq Link	\r\n                <p><strong>IQ Link</strong> je logická výzva v kapse! Táto geniálna hra testuje vaše priestorové myslenie. Cieľ: správne poskladať 36 dielikov na 24 miest pomocou ich prepojenia (krúžok a gulička sa môžu zlúčiť!).</p>\r\n                <p>Ideálna pre deti aj dospelých od 8 rokov.</p>\r\n            	11.99	8	1	1	f	t	f	2025-05-10 16:09:31	2025-05-10 16:09:31	f	\N
15	Jenga	\r\n                <p><strong>Jenga</strong> je napínavá hra zručnosti a trpezlivosti! Klasická hra, kde hráči striedavo vytŕhajú drevený kameň z veže a ukladajú ich navrch. Cieľom je nezhodiť vežu – ten, kto spôsobí pád, prehráva!</p>\r\n                <p>Postavte vežu z 18 poschodí (každé z 3 kameňov). Ťahajte a ukladajte kameň jednou rukou. Nové poschodie musí byť dokončené pred začatím ďalšieho.</p>\r\n                <p>Obsah balenia: 54 drevených kameňov (veža má výšku 32 cm po postavení).</p>\r\n                <p>Ideálna pre 2-8 hráčov od 6 rokov. Dĺžka hry: 20 min.</p>\r\n            	8.50	6	2	8	t	f	f	2025-05-10 16:09:31	2025-05-10 16:09:31	f	\N
16	Meme	\r\n                <p><strong>What Do You Meme?</strong> je zábavná spoločenská hra, ktorá testuje váš zmysel pre humor. Princíp je jednoduchý: kombinujete obrázkové karty s textovými a vytvárate čo najvtipnejšie memes. V každom kole iný hráč rozhoduje, ktorá kombinácia zvíťazí.</p>\r\n                <p>Ideálna pre 3-20 hráčov od 18 rokov. Dĺžka hry: 10 – 60 min.</p>\r\n            	30.00	18	3	20	f	f	t	2025-05-10 16:09:31	2025-05-10 16:09:31	f	25.00
17	Monopoly	\r\n                <p><strong>Monopoly: Chudák</strong> je unikátna verzia klasickej hry Monopoly, kde sa vyplatí byť „chudák“! Cieľom je získať špeciálne mince útěchy, ktoré môžete vymeniť za výhody – čím viac strácate, tým lepšie bonusy získavate.</p>\r\n                <p><strong>Novinky:</strong></p>\r\n                <ul>\r\n                    <li>Mince útěchy – menia sa na cenné výhody</li>\r\n                    <li>Figurka pana Monopolyho – prináša exkluzívne bonusy</li>\r\n                    <li>Karty Šanca a Pokladňa s novými možnosťami</li>\r\n                </ul>\r\n                <p>Hra obsahuje klasické pravidlá Monopoly, no s prevratnou stratégiou – niekedy sa oplatí prehrať, aby ste nakoniec vyhrali!</p>\r\n            	40.00	8	2	6	f	t	f	2025-05-10 16:09:31	2025-05-10 16:09:31	f	\N
18	Pexesohm	\r\n                <p><strong>Vedomostné pexeso – Hlavné mestá sveta</strong> je klasické pexeso s twistom! Namiesto obrázkov spájate hlavné mesto s príslušným štátom. Základné pravidlá ostávajú – hľadáte dvojice, ale tentoraz s prídavkom vzdelávania.</p>\r\n                <p>Ideálne pre deti aj dospelých, ktorí sa chcú zabaviť a zároveň naučiť. Skvelý spôsob, ako otestovať a rozšíriť svoje znalosti o geografii!</p>\r\n            	7.50	12	2	6	t	f	f	2025-05-10 16:09:31	2025-05-10 16:09:31	f	\N
19	Puzzle Kvet	\r\n                <p><strong>Drevené puzzle – Kvetinová dekorácia</strong> sú elegantné drevené puzzle v tvare ružového karafiátu (klinčeka), ktoré poslúžia ako originálna domáca dekorácia. Vďaka modulárnemu dizajnu vytvoríte rôzne aranžmá podľa nálady, čím si prispôsobíte vzhľad podľa aktuálnej atmosféry.</p>\r\n                <p>Ideálne pre milovníkov prírodných dekorácií a kreatívnej tvorivosti! Oživte svoj interiér originálnym a prírodným spôsobom.</p>\r\n            	9.99	10	1	1	f	t	f	2025-05-10 16:09:31	2025-05-10 16:09:31	f	\N
20	Puzzle Lalia	\r\n                <p><strong>Puzzle Vodná lalia</strong> je exkluzívna limitovaná edícia, ktorá ponúka 1000 dielikov s fascinujúcou fotografiou "Water Lily" od Irawana Subingara. Po zložení získate umelecké dielo v rozmere 48 x 68,3 cm, ktoré prináša krásu prírody do vášho domova.</p>\r\n                <p>Ideálne pre tých, ktorí oceňujú kvalitné umelecké spracovanie a fascinujúce prírodné motívy. Skvelý spôsob, ako splynúť s prírodou a zároveň si vychutnať zábavu pri skladaní puzzle.</p>\r\n            	10.50	14	1	1	t	f	f	2025-05-10 16:09:31	2025-05-10 16:09:31	f	\N
21	Saboter	\r\n                <p>Hráči sa stávajú buď zlatokopmi, alebo sabotérmi v podzemných tuneloch. Zlatokopi spolupracujú na nájdení pokladu, zatiaľ čo sabotéri tajne kladú prekážky. Nikdy neviete, kto je kým! Cieľom hry je buď nájsť poklad, alebo sabotovať plán ostatných hráčov.</p>\r\n                <p>Balenie obsahuje 110 kariet, vrátane akčných kariet a nugetov, ktoré zvyšujú dynamiku hry. Hra plná napätia a nečakaných zvratov!</p>\r\n            	10.99	8	3	10	f	f	t	2025-05-10 16:09:31	2025-05-10 16:09:31	f	8.99
22	Scrabble	\r\n                <p>V tejto svetoznámej hre pre 2-4 hráčov skladáte slová z písmenkových kameňov na hracej ploche 15x15. Každé písmeno má svoju bodovú hodnotu podľa frekvencie výskytu v jazyku, čo pridáva strategický rozmer.</p>\r\n                <p>Hra rozvíja: slovnú zásobu, strategické myslenie a logické uvažovanie, a je ideálna na rodinné večery aj vzdelávacie aktivity.</p>\r\n                <p>Balenie obsahuje: 110 písmen, 4 stojany, hraciu dosku a pravidlá.</p>\r\n            	9.99	8	2	4	f	t	f	2025-05-10 16:09:31	2025-05-10 16:09:31	f	\N
23	Túry mury	\r\n                <p>Táto originálna kartová hra pre 3-5 hráčov (od 7 rokov) mení pravidlá – podvádzanie tu nie je zakázané, ale priamo vyžadované! Cieľom je zbaviť sa všetkých kariet ako prvý, a to aj trikmi: schovávaním kariet v rukáve či pod stolom.</p>\r\n                <p>Hra obsahuje: 72 kariet (akčné, číselné a špeciálne "Túry Můry"), figúrku strážneho chrobáka na odhaľovanie podvodníkov a pravidlá v češtine.</p>\r\n            	7.50	7	3	5	t	f	f	2025-05-10 16:09:31	2025-05-10 16:09:31	f	\N
24	Uno Deluxe	\r\n                <p>Zábava, ktorá nikdy nekončí! Cieľom je dosiahnuť 500 bodov – zbav sa kariet ako prvý! Akčné karty menia hru a krik "UNO!" keď máš poslednú kartu, je povinný.</p>\r\n                <p>Rýchla, šialená hra pre všetky veky!</p>\r\n                <p>V balení: 108 kariet, návod, bodovacia podložka a pevná škatuľka.</p>\r\n            	9.09	7	2	10	f	t	f	2025-05-10 16:09:31	2025-05-10 16:09:31	f	\N
\.


--
-- TOC entry 5055 (class 0 OID 23619)
-- Dependencies: 243
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.sessions (id, user_id, ip_address, user_agent, payload, last_activity) FROM stdin;
SPjUIgWw7bKmHuCHUY9Jz06mEXyv1Nt2xPZJYLj3	\N	127.0.0.1	Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36	YTozOntzOjY6Il90b2tlbiI7czo0MDoiaGVyMjBNTHZpaEZ1VXJ2NGtidjcxOE5OVnd3VTBIcUF1WTF5NEM4YSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zaG9wP2hyYWNvdj0yJm1heF9wcmljZT0yNSZtaW5fcHJpY2U9MSZwYWdlPTImdmVrb3ZhX2thdGVnb3JpYT0xNiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=	1746894040
\.


--
-- TOC entry 5056 (class 0 OID 23624)
-- Dependencies: 244
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
1	Test User	test@example.com	2025-05-10 16:09:30	$2y$12$UU5YiZKud0BQB/d9/F7HqOJRUYDCrPwVFoFkOnz4y7IfKi/WDXNv6	\N	2025-05-10 16:09:30	2025-05-10 16:09:30
\.


--
-- TOC entry 5075 (class 0 OID 0)
-- Dependencies: 218
-- Name: box_collect_locations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.box_collect_locations_id_seq', 10, true);


--
-- TOC entry 5076 (class 0 OID 0)
-- Dependencies: 222
-- Name: carts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.carts_id_seq', 1, false);


--
-- TOC entry 5077 (class 0 OID 0)
-- Dependencies: 224
-- Name: categories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categories_id_seq', 8, true);


--
-- TOC entry 5078 (class 0 OID 0)
-- Dependencies: 226
-- Name: category_product_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.category_product_id_seq', 53, true);


--
-- TOC entry 5079 (class 0 OID 0)
-- Dependencies: 228
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- TOC entry 5080 (class 0 OID 0)
-- Dependencies: 231
-- Name: jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.jobs_id_seq', 1, false);


--
-- TOC entry 5081 (class 0 OID 0)
-- Dependencies: 233
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 14, true);


--
-- TOC entry 5082 (class 0 OID 0)
-- Dependencies: 235
-- Name: order_products_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.order_products_id_seq', 1, false);


--
-- TOC entry 5083 (class 0 OID 0)
-- Dependencies: 237
-- Name: orders_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.orders_id_seq', 1, false);


--
-- TOC entry 5084 (class 0 OID 0)
-- Dependencies: 240
-- Name: product_images_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.product_images_id_seq', 48, true);


--
-- TOC entry 5085 (class 0 OID 0)
-- Dependencies: 242
-- Name: products_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.products_id_seq', 24, true);


--
-- TOC entry 5086 (class 0 OID 0)
-- Dependencies: 245
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 1, true);


--
-- TOC entry 4835 (class 2606 OID 23643)
-- Name: box_collect_locations box_collect_locations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.box_collect_locations
    ADD CONSTRAINT box_collect_locations_pkey PRIMARY KEY (id);


--
-- TOC entry 4839 (class 2606 OID 23645)
-- Name: cache_locks cache_locks_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cache_locks
    ADD CONSTRAINT cache_locks_pkey PRIMARY KEY (key);


--
-- TOC entry 4837 (class 2606 OID 23647)
-- Name: cache cache_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cache
    ADD CONSTRAINT cache_pkey PRIMARY KEY (key);


--
-- TOC entry 4841 (class 2606 OID 23649)
-- Name: carts carts_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.carts
    ADD CONSTRAINT carts_pkey PRIMARY KEY (id);


--
-- TOC entry 4843 (class 2606 OID 23651)
-- Name: categories categories_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_pkey PRIMARY KEY (id);


--
-- TOC entry 4845 (class 2606 OID 23653)
-- Name: categories categories_slug_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_slug_unique UNIQUE (slug);


--
-- TOC entry 4847 (class 2606 OID 23655)
-- Name: category_product category_product_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.category_product
    ADD CONSTRAINT category_product_pkey PRIMARY KEY (id);


--
-- TOC entry 4849 (class 2606 OID 23657)
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- TOC entry 4851 (class 2606 OID 23659)
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- TOC entry 4853 (class 2606 OID 23661)
-- Name: job_batches job_batches_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_batches
    ADD CONSTRAINT job_batches_pkey PRIMARY KEY (id);


--
-- TOC entry 4855 (class 2606 OID 23663)
-- Name: jobs jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_pkey PRIMARY KEY (id);


--
-- TOC entry 4858 (class 2606 OID 23665)
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- TOC entry 4860 (class 2606 OID 23667)
-- Name: order_products order_products_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.order_products
    ADD CONSTRAINT order_products_pkey PRIMARY KEY (id);


--
-- TOC entry 4862 (class 2606 OID 23669)
-- Name: orders orders_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.orders
    ADD CONSTRAINT orders_pkey PRIMARY KEY (id);


--
-- TOC entry 4864 (class 2606 OID 23671)
-- Name: password_reset_tokens password_reset_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);


--
-- TOC entry 4866 (class 2606 OID 23673)
-- Name: product_images product_images_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product_images
    ADD CONSTRAINT product_images_pkey PRIMARY KEY (id);


--
-- TOC entry 4868 (class 2606 OID 23675)
-- Name: products products_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_pkey PRIMARY KEY (id);


--
-- TOC entry 4871 (class 2606 OID 23677)
-- Name: sessions sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);


--
-- TOC entry 4874 (class 2606 OID 23679)
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 4876 (class 2606 OID 23681)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 4856 (class 1259 OID 23682)
-- Name: jobs_queue_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX jobs_queue_index ON public.jobs USING btree (queue);


--
-- TOC entry 4869 (class 1259 OID 23683)
-- Name: sessions_last_activity_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX sessions_last_activity_index ON public.sessions USING btree (last_activity);


--
-- TOC entry 4872 (class 1259 OID 23684)
-- Name: sessions_user_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX sessions_user_id_index ON public.sessions USING btree (user_id);


--
-- TOC entry 4883 (class 2606 OID 23685)
-- Name: sessions 1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT "1" FOREIGN KEY (user_id) REFERENCES public.users(id);


--
-- TOC entry 4877 (class 2606 OID 23690)
-- Name: carts carts_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.carts
    ADD CONSTRAINT carts_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- TOC entry 4878 (class 2606 OID 23695)
-- Name: category_product category_product_category_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.category_product
    ADD CONSTRAINT category_product_category_id_foreign FOREIGN KEY (category_id) REFERENCES public.categories(id) ON DELETE CASCADE;


--
-- TOC entry 4879 (class 2606 OID 23700)
-- Name: category_product category_product_product_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.category_product
    ADD CONSTRAINT category_product_product_id_foreign FOREIGN KEY (product_id) REFERENCES public.products(id) ON DELETE CASCADE;


--
-- TOC entry 4880 (class 2606 OID 23705)
-- Name: order_products order_products_order_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.order_products
    ADD CONSTRAINT order_products_order_id_foreign FOREIGN KEY (order_id) REFERENCES public.orders(id) ON DELETE CASCADE;


--
-- TOC entry 4881 (class 2606 OID 23710)
-- Name: order_products order_products_product_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.order_products
    ADD CONSTRAINT order_products_product_id_foreign FOREIGN KEY (product_id) REFERENCES public.products(id) ON DELETE CASCADE;


--
-- TOC entry 4882 (class 2606 OID 23715)
-- Name: product_images product_images_product_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product_images
    ADD CONSTRAINT product_images_product_id_foreign FOREIGN KEY (product_id) REFERENCES public.products(id) ON DELETE CASCADE;


-- Completed on 2025-05-10 18:29:11

--
-- PostgreSQL database dump complete
--

