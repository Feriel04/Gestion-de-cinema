--
-- PostgreSQL database dump
--

-- Dumped from database version 14.5
-- Dumped by pg_dump version 14.5

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

--
-- Name: public; Type: SCHEMA; Schema: -; Owner: rouas
--

CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO rouas;

--
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: rouas
--

COMMENT ON SCHEMA public IS 'standard public schema';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: carte_abonnement; Type: TABLE; Schema: public; Owner: rouas
--

CREATE TABLE public.carte_abonnement (
    id_carte character(10) NOT NULL,
    nom_carte character varying(20) NOT NULL,
    date_delivrance date NOT NULL,
    date_debut_ab date NOT NULL,
    date_fin_ab date NOT NULL,
    type_ab character varying(20) NOT NULL,
    nb_seance integer NOT NULL,
    prix_ab integer NOT NULL,
    id_seance character(8) NOT NULL,
    id_client_ab character(8) NOT NULL
);


ALTER TABLE public.carte_abonnement OWNER TO rouas;

--
-- Name: client; Type: TABLE; Schema: public; Owner: rouas
--

CREATE TABLE public.client (
    id_client character(8) NOT NULL,
    datenai_client date NOT NULL,
    fonction_client character varying(20)
);


ALTER TABLE public.client OWNER TO rouas;

--
-- Name: client_abonne; Type: TABLE; Schema: public; Owner: rouas
--

CREATE TABLE public.client_abonne (
    id_client_ab character(8) NOT NULL,
    nom_client character varying(20) NOT NULL,
    adress_client character varying(100) NOT NULL,
    mail_client character varying(30) NOT NULL,
    tel_client character(10) NOT NULL
);


ALTER TABLE public.client_abonne OWNER TO rouas;

--
-- Name: client_passager; Type: TABLE; Schema: public; Owner: rouas
--

CREATE TABLE public.client_passager (
    id_client_pass character(8) NOT NULL
);


ALTER TABLE public.client_passager OWNER TO rouas;

--
-- Name: employe; Type: TABLE; Schema: public; Owner: rouas
--

CREATE TABLE public.employe (
    id_emp character(4) NOT NULL,
    nom_emp character varying(20) NOT NULL,
    salaire_emp double precision NOT NULL,
    statut_emp character varying(20) NOT NULL,
    tel_emp character(10),
    mail_emp character varying(30),
    mot_de_passe character varying
);


ALTER TABLE public.employe OWNER TO rouas;

--
-- Name: film; Type: TABLE; Schema: public; Owner: rouas
--

CREATE TABLE public.film (
    id_film character(6) NOT NULL,
    nom_film character varying(20) NOT NULL,
    date_film date NOT NULL,
    lang_film character(20) NOT NULL,
    auteur_film character varying(20) NOT NULL,
    id_genre character(6) NOT NULL
);


ALTER TABLE public.film OWNER TO rouas;

--
-- Name: genre; Type: TABLE; Schema: public; Owner: rouas
--

CREATE TABLE public.genre (
    id_genre character(6) NOT NULL,
    nom_genre character varying(50) NOT NULL
);


ALTER TABLE public.genre OWNER TO rouas;

--
-- Name: salle; Type: TABLE; Schema: public; Owner: rouas
--

CREATE TABLE public.salle (
    id_salle character(6) NOT NULL,
    nom_salle character varying(20) NOT NULL,
    num_salle character varying(10) NOT NULL,
    capacite_salle integer NOT NULL,
    id_site character(4) NOT NULL
);


ALTER TABLE public.salle OWNER TO rouas;

--
-- Name: seance; Type: TABLE; Schema: public; Owner: rouas
--

CREATE TABLE public.seance (
    id_seance character(8) NOT NULL,
    id_salle character(6) NOT NULL,
    id_film character(6) NOT NULL,
    id_emp character(4) NOT NULL,
    horaire_seance timestamp with time zone NOT NULL
);


ALTER TABLE public.seance OWNER TO rouas;

--
-- Name: sites; Type: TABLE; Schema: public; Owner: rouas
--

CREATE TABLE public.sites (
    id_site character(4) NOT NULL,
    nom_site character varying(20) NOT NULL,
    adresse character varying(40) NOT NULL,
    "codePostal_site" integer NOT NULL,
    ville_site character varying(20),
    pays_site character varying(20)
);


ALTER TABLE public.sites OWNER TO rouas;

--
-- Name: ticket; Type: TABLE; Schema: public; Owner: rouas
--

CREATE TABLE public.ticket (
    id_ticket character(10) NOT NULL,
    nom_ticket character varying(20) NOT NULL,
    date_ticket date NOT NULL,
    prix_ticket integer NOT NULL,
    id_seance character(8) NOT NULL,
    id_client_pass character(8) NOT NULL,
    tarif_ticket character varying(10) NOT NULL,
    numplace_ticket integer NOT NULL
);


ALTER TABLE public.ticket OWNER TO rouas;

--
-- Data for Name: carte_abonnement; Type: TABLE DATA; Schema: public; Owner: rouas
--

INSERT INTO public.carte_abonnement VALUES ('ca000001  ', 'carte1', '2020-01-03', '2020-01-03', '2021-01-04', 'annuel', 240, 250, 'se000001', 'c0000001');
INSERT INTO public.carte_abonnement VALUES ('ca000002  ', 'carte2', '2019-10-29', '2019-01-11', '2020-01-11', 'annuel', 240, 250, 'se000002', 'c0000002');
INSERT INTO public.carte_abonnement VALUES ('ca000003  ', 'carte3', '2019-04-04', '2019-04-04', '2019-04-05', 'mensuel', 20, 80, 'se000003', 'c0000003');
INSERT INTO public.carte_abonnement VALUES ('ca000004  ', 'carte4', '2022-07-15', '2022-08-15', '2022-08-31', 'semaine', 5, 25, 'se000004', 'c0000004');


--
-- Data for Name: client; Type: TABLE DATA; Schema: public; Owner: rouas
--

INSERT INTO public.client VALUES ('c0000001', '1965-12-06', 'retaite');
INSERT INTO public.client VALUES ('c0000002', '1990-04-03', 'jeune');
INSERT INTO public.client VALUES ('c0000003', '2010-02-07', 'enfant');
INSERT INTO public.client VALUES ('c0000004', '2000-06-10', 'etudiant');
INSERT INTO public.client VALUES ('c0000005', '2002-09-12', 'etudiant');


--
-- Data for Name: client_abonne; Type: TABLE DATA; Schema: public; Owner: rouas
--

INSERT INTO public.client_abonne VALUES ('c0000001', 'thomas', '23 avenue charle de gaulle 75000 ,Paris', 'thomas@gmail.com', '0665656533');
INSERT INTO public.client_abonne VALUES ('c0000002', 'gabriel', '20 rue franklin 91000,Evry', 'gabriel@yahoo.fr', '0767890987');
INSERT INTO public.client_abonne VALUES ('c0000003', 'feriel', '21 rue saint martin 95000,Cergy', 'feriel@outlook.fr', '0689065432');
INSERT INTO public.client_abonne VALUES ('c0000004', 'eva', '03 avenue de paris 94300,Vincennes', 'eva@gmail.com', '654321909 ');


--
-- Data for Name: client_passager; Type: TABLE DATA; Schema: public; Owner: rouas
--

INSERT INTO public.client_passager VALUES ('c0000001');
INSERT INTO public.client_passager VALUES ('c0000002');
INSERT INTO public.client_passager VALUES ('c0000004');
INSERT INTO public.client_passager VALUES ('c0000003');
INSERT INTO public.client_passager VALUES ('c0000005');


--
-- Data for Name: employe; Type: TABLE DATA; Schema: public; Owner: rouas
--

INSERT INTO public.employe VALUES ('e001', 'chabane', 1500, 'agent de sécurité', '075643321 ', 'chabane@gmail.com', '$1$$shCSTKzSBwNfNRbGss8Ge0');
INSERT INTO public.employe VALUES ('e002', 'zakaria', 2000, 'gérant', '0645876520', 'zakaria@yahoo.fr', '$1$$SQ3sRD2yFAxHlxX58oABh.');
INSERT INTO public.employe VALUES ('e003', 'fadma', 740, 'vendeuse', '0765432102', 'fadma@yahoo.fr', '$1$$anY6NpKsVk6BYh2UXRCfn0');
INSERT INTO public.employe VALUES ('e004', 'malha', 1000, 'employée polyvalente', '0654300001', 'malha@gmail.com', '$1$$tvsYtgod4QtzR0PoBr1ms0');


--
-- Data for Name: film; Type: TABLE DATA; Schema: public; Owner: rouas
--

INSERT INTO public.film VALUES ('f00001', 'film1', '2009-10-20', 'francais            ', 'auteur1', 'g00001');
INSERT INTO public.film VALUES ('f00002', 'film2', '2020-03-02', 'chinois

           ', 'auteur2', 'g00002');
INSERT INTO public.film VALUES ('f00003', 'film3', '1990-01-01', 'allemand            ', 'auteur3', 'g00003');
INSERT INTO public.film VALUES ('f00004', 'film4', '2001-09-12', 'arabe               ', 'auteur4', 'g00004');


--
-- Data for Name: genre; Type: TABLE DATA; Schema: public; Owner: rouas
--

INSERT INTO public.genre VALUES ('g00001', 'comedie');
INSERT INTO public.genre VALUES ('g00002', 'horreur');
INSERT INTO public.genre VALUES ('g00003', 'romantique');
INSERT INTO public.genre VALUES ('g00004', 'comedie et romantique');


--
-- Data for Name: salle; Type: TABLE DATA; Schema: public; Owner: rouas
--

INSERT INTO public.salle VALUES ('s00002', 'Pathé', 'P9500', 150, 'si02');
INSERT INTO public.salle VALUES ('s00001', 'Gaumont', 'G213', 200, 'si01');
INSERT INTO public.salle VALUES ('s00003', 'CGR', 'CGR2390', 80, 'si03');
INSERT INTO public.salle VALUES ('s00004', 'Mégarama', 'M75130', 50, 'si04');


--
-- Data for Name: seance; Type: TABLE DATA; Schema: public; Owner: rouas
--

INSERT INTO public.seance VALUES ('se000001', 's00001', 'f00001', 'e001', '2022-05-11 17:10:00+00');
INSERT INTO public.seance VALUES ('se000002', 's00002', 'f00002', 'e002', '2023-11-09 10:00:00+00');
INSERT INTO public.seance VALUES ('se000003', 's00003', 'f00003', 'e003', '2022-12-12 21:30:00+00');
INSERT INTO public.seance VALUES ('se000004', 's00004', 'f00004', 'e004', '2022-11-17 14:45:00+00');


--
-- Data for Name: sites; Type: TABLE DATA; Schema: public; Owner: rouas
--

INSERT INTO public.sites VALUES ('si01', 'cinema1', '23 rue de paris', 7500, 'Paris', 'france');
INSERT INTO public.sites VALUES ('si02', 'cinema1', '2 rue de Lendemain', 95800, 'Cergy le haut', '');
INSERT INTO public.sites VALUES ('si03', 'cinema3', '2 rue gabriel', 91000, 'Evry', 'france');
INSERT INTO public.sites VALUES ('si04', 'cinema4', '13 boulvard saint denis', 77000, 'Marne la vallée', '');


--
-- Data for Name: ticket; Type: TABLE DATA; Schema: public; Owner: rouas
--

INSERT INTO public.ticket VALUES ('t0000001  ', 'ticket1', '2022-12-12', 6, 'se000001', 'c0000001', 'etudiant', 45);
INSERT INTO public.ticket VALUES ('t0000002  ', 'ticket2', '2022-02-03', 10, 'se000001', 'c0000001', 'standard', 20);
INSERT INTO public.ticket VALUES ('t0000003  ', 'ticket3', '2022-07-17', 8, 'se000003', 'c0000003', 'jeune', 110);
INSERT INTO public.ticket VALUES ('t0000004  ', 'ticket4', '2022-09-29', 4, 'se000004', 'c0000004', 'enfant', 2);
INSERT INTO public.ticket VALUES ('t0000005  ', 'ticket5', '2022-11-05', 6, 'se000003', 'c0000001', 'etudiant', 37);


--
-- Name: carte_abonnement carte_abonnement_pkey; Type: CONSTRAINT; Schema: public; Owner: rouas
--

ALTER TABLE ONLY public.carte_abonnement
    ADD CONSTRAINT carte_abonnement_pkey PRIMARY KEY (id_carte);


--
-- Name: client_abonne client_abonne_pkey; Type: CONSTRAINT; Schema: public; Owner: rouas
--

ALTER TABLE ONLY public.client_abonne
    ADD CONSTRAINT client_abonne_pkey PRIMARY KEY (id_client_ab);


--
-- Name: client_passager client_passager_pkey; Type: CONSTRAINT; Schema: public; Owner: rouas
--

ALTER TABLE ONLY public.client_passager
    ADD CONSTRAINT client_passager_pkey PRIMARY KEY (id_client_pass);


--
-- Name: client client_pkey; Type: CONSTRAINT; Schema: public; Owner: rouas
--

ALTER TABLE ONLY public.client
    ADD CONSTRAINT client_pkey PRIMARY KEY (id_client);


--
-- Name: employe employe_pkey; Type: CONSTRAINT; Schema: public; Owner: rouas
--

ALTER TABLE ONLY public.employe
    ADD CONSTRAINT employe_pkey PRIMARY KEY (id_emp);


--
-- Name: film film_pkey; Type: CONSTRAINT; Schema: public; Owner: rouas
--

ALTER TABLE ONLY public.film
    ADD CONSTRAINT film_pkey PRIMARY KEY (id_film);


--
-- Name: genre genre_pkey; Type: CONSTRAINT; Schema: public; Owner: rouas
--

ALTER TABLE ONLY public.genre
    ADD CONSTRAINT genre_pkey PRIMARY KEY (id_genre);


--
-- Name: salle salle_pkey; Type: CONSTRAINT; Schema: public; Owner: rouas
--

ALTER TABLE ONLY public.salle
    ADD CONSTRAINT salle_pkey PRIMARY KEY (id_salle);


--
-- Name: seance seance_pkey; Type: CONSTRAINT; Schema: public; Owner: rouas
--

ALTER TABLE ONLY public.seance
    ADD CONSTRAINT seance_pkey PRIMARY KEY (id_seance);


--
-- Name: sites sites_pkey; Type: CONSTRAINT; Schema: public; Owner: rouas
--

ALTER TABLE ONLY public.sites
    ADD CONSTRAINT sites_pkey PRIMARY KEY (id_site);


--
-- Name: ticket ticket_pkey; Type: CONSTRAINT; Schema: public; Owner: rouas
--

ALTER TABLE ONLY public.ticket
    ADD CONSTRAINT ticket_pkey PRIMARY KEY (id_ticket);


--
-- Name: carte_abonnement carte_abonnement_id_client_ab_fkey; Type: FK CONSTRAINT; Schema: public; Owner: rouas
--

ALTER TABLE ONLY public.carte_abonnement
    ADD CONSTRAINT carte_abonnement_id_client_ab_fkey FOREIGN KEY (id_client_ab) REFERENCES public.client_abonne(id_client_ab);


--
-- Name: carte_abonnement carte_abonnement_id_seance_fkey; Type: FK CONSTRAINT; Schema: public; Owner: rouas
--

ALTER TABLE ONLY public.carte_abonnement
    ADD CONSTRAINT carte_abonnement_id_seance_fkey FOREIGN KEY (id_seance) REFERENCES public.seance(id_seance);


--
-- Name: client_abonne client_abonne_id_client_ab_fkey; Type: FK CONSTRAINT; Schema: public; Owner: rouas
--

ALTER TABLE ONLY public.client_abonne
    ADD CONSTRAINT client_abonne_id_client_ab_fkey FOREIGN KEY (id_client_ab) REFERENCES public.client(id_client);


--
-- Name: client_passager client_passager_id_client_pass_fkey; Type: FK CONSTRAINT; Schema: public; Owner: rouas
--

ALTER TABLE ONLY public.client_passager
    ADD CONSTRAINT client_passager_id_client_pass_fkey FOREIGN KEY (id_client_pass) REFERENCES public.client(id_client);


--
-- Name: film film_id_genre_fkey; Type: FK CONSTRAINT; Schema: public; Owner: rouas
--

ALTER TABLE ONLY public.film
    ADD CONSTRAINT film_id_genre_fkey FOREIGN KEY (id_genre) REFERENCES public.genre(id_genre);


--
-- Name: salle salle_id_site_fkey; Type: FK CONSTRAINT; Schema: public; Owner: rouas
--

ALTER TABLE ONLY public.salle
    ADD CONSTRAINT salle_id_site_fkey FOREIGN KEY (id_site) REFERENCES public.sites(id_site);


--
-- Name: seance seance_id_emp_fkey; Type: FK CONSTRAINT; Schema: public; Owner: rouas
--

ALTER TABLE ONLY public.seance
    ADD CONSTRAINT seance_id_emp_fkey FOREIGN KEY (id_emp) REFERENCES public.employe(id_emp);


--
-- Name: seance seance_id_film_fkey; Type: FK CONSTRAINT; Schema: public; Owner: rouas
--

ALTER TABLE ONLY public.seance
    ADD CONSTRAINT seance_id_film_fkey FOREIGN KEY (id_film) REFERENCES public.film(id_film);


--
-- Name: seance seance_id_salle_fkey; Type: FK CONSTRAINT; Schema: public; Owner: rouas
--

ALTER TABLE ONLY public.seance
    ADD CONSTRAINT seance_id_salle_fkey FOREIGN KEY (id_salle) REFERENCES public.salle(id_salle);


--
-- Name: ticket ticket_id_client_pass_fkey; Type: FK CONSTRAINT; Schema: public; Owner: rouas
--

ALTER TABLE ONLY public.ticket
    ADD CONSTRAINT ticket_id_client_pass_fkey FOREIGN KEY (id_client_pass) REFERENCES public.client(id_client);


--
-- Name: ticket ticket_id_seance_fkey; Type: FK CONSTRAINT; Schema: public; Owner: rouas
--

ALTER TABLE ONLY public.ticket
    ADD CONSTRAINT ticket_id_seance_fkey FOREIGN KEY (id_seance) REFERENCES public.seance(id_seance);


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: rouas
--

REVOKE ALL ON SCHEMA public FROM postgres;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO rouas;


--
-- PostgreSQL database dump complete
--

