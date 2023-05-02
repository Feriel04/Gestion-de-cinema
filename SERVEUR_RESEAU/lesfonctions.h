#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <errno.h>
#include <time.h>
#include "structure.h"
#include "/usr/include/postgresql/libpq-fe.h"

#ifndef LESFONCTIONS_H
#define LESFONCTIONS_H
#define PRIX "300"
#define TAILLE 11400


     	
int notticketexiste(PGconn* conn,char id_ticket[TAILLE]){

	char str1[TAILLE],str2[TAILLE],str3[TAILLE];
	strcpy(str1,"SELECT * FROM ticket where id_ticket='");
        strcpy(str2,id_ticket);
        strcpy(str3,"';");
        strcat(str1,str2);
        strcat(str1,str3);    

         PGresult *res = PQexec(conn,str1);
         
	return PQresultStatus(res) == PGRES_TUPLES_OK & !PQntuples(res);

}



void supprimerTicket(PGconn* conn,char id_ticket[TAILLE]){

	char str1[TAILLE],str2[TAILLE],str3[TAILLE];
	PGresult *res;
	
	strcpy(str1,"DELETE FROM ticket WHERE id_ticket='");
        strcpy(str2,id_ticket);
        strcpy(str3,"';");
        strcat(str1,str2);
        strcat(str1,str3); 
     
         
         res = PQexec(conn,str1);
         
    

}

int notcarteexiste(PGconn* conn,char id_carte[TAILLE]){

	char str1[TAILLE],str2[TAILLE],str3[TAILLE];
	strcpy(str1,"SELECT * FROM carte_abonnement where id_carte='");
        strcpy(str2,id_carte);
        strcpy(str3,"';");
        strcat(str1,str2);
        strcat(str1,str3);    

         PGresult *res = PQexec(conn,str1);
         
	return PQresultStatus(res) == PGRES_TUPLES_OK & !PQntuples(res);

}



void supprimerCarte(PGconn* conn,char id_carte[TAILLE]){

	char str1[TAILLE],str2[TAILLE],str3[TAILLE];
	PGresult *res;
	
	strcpy(str1,"DELETE FROM carte_abonnement WHERE id_carte='");
        strcpy(str2,id_carte);
        strcpy(str3,"';");
        strcat(str1,str2);
        strcat(str1,str3); 
     
         
         res = PQexec(conn,str1);
         
    

}




#endif
