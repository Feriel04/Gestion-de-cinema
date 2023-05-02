#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <sys/socket.h>
#include <sys/types.h>
#include <netinet/in.h>
#include <arpa/inet.h>
#include <unistd.h> 
#include "structure.h"
#include "lesfonctions.h"
#include "/usr/include/postgresql/libpq-fe.h"

#define PORT 44557
#define TAILLE 11400

static void exit_nicely(PGconn *conn){
    const char *conninfo;
    PGresult   *res;
    int         nFields;
    int         i,
                j;
    PQfinish(conn);
    exit(1);
}
int main(int argc, char **argv)
{
    const char *conninfo;
    PGconn     *conn;
    PGresult   *res;
    int         nFields;
    int         i,
                j;


    /*
     * If the user supplies a parameter on the command line, use it as the
     * conninfo string; otherwise default to setting dbname=postgres and using
     * environment variables or defaults for all other connection parameters.
     */
   if (argc > 1)
        conninfo= argv[1];
    else
        conninfo = "dbname=rouas_projet_cinema host=postgresql-rouas.alwaysdata.net port=5432 user=rouas password=lila123lila";

    /* Make a connection to the database */
    conn = PQconnectdb(conninfo);
if (PQstatus(conn) == CONNECTION_OK){
	printf(" \n connecté \n");
	}

    /* Check to see that the backend connection was successfully made */
    else 
    {
        fprintf(stderr, "Connection to database failed: %s",
                PQerrorMessage(conn));
        exit_nicely(conn);
    }

    /* Set always-secure search path, so malicious users can't take control. */
    res = PQexec(conn,
    "SELECT pg_catalog.set_config('search_path', '', false)");
                 
    if (PQresultStatus(res) != PGRES_TUPLES_OK)
    {
        fprintf(stderr, "SET failed: %s", PQerrorMessage(conn));
        PQclear(res);
        exit_nicely(conn);
    }

    /*
     * Should PQclear PGresult whenever it is no longer needed to avoid memory
     * leaks
     */
    PQclear(res);

    /*
     * Our test case here involves using a cursor, for which we must be inside
     * a transaction block.  We could do the whole thing with a single
     * PQexec() of "select * from pg_database", but that's too trivial to make
     * a good example.
     */

    /* Start a transaction block */
    res = PQexec(conn, "BEGIN");
    if (PQresultStatus(res) != PGRES_COMMAND_OK)
    {
        fprintf(stderr, "BEGIN command failed: %s", PQerrorMessage(conn));
        PQclear(res);
        exit_nicely(conn);
    }
    PQclear(res);

    /*
     * Fetch rows from pg_database, the system catalog of databases
     */
    res = PQexec(conn, 
    "DECLARE myportal CURSOR FOR select * from pg_database");
    if (PQresultStatus(res) != PGRES_COMMAND_OK)
    {
        fprintf(stderr, "DECLARE CURSOR failed: %s", PQerrorMessage(conn));
        PQclear(res);
        exit_nicely(conn);
    }
    PQclear(res);

    res = PQexec(conn, "FETCH ALL in myportal");
    if (PQresultStatus(res) != PGRES_TUPLES_OK)
    {
        fprintf(stderr, "FETCH ALL failed: %s", PQerrorMessage(conn));
        PQclear(res);
        exit_nicely(conn);
    }

  
    nFields = PQnfields(res);

    PQclear(res);

    /* close the portal ... we don't bother to check for errors ... */
    res = PQexec(conn, "CLOSE myportal");
    PQclear(res);

    /* end the transaction */
    res = PQexec(conn, "END");
    PQclear(res);

    /* close the connection to the database and cleanup */
   // PQfinish(conn);

           

       // PGconn *conn=connexion_bdd();
      
	int socketfd;
	struct sockaddr_in serverAddr;
	
	int newSocket;
	struct sockaddr_in newAddr;
	
	socklen_t addr_size;
   
        
	socketfd=socket(PF_INET, SOCK_STREAM,0);
	// server socket create avec succes 
        memset(&serverAddr,'\0',sizeof(serverAddr));
        
        serverAddr.sin_family=AF_INET;
        serverAddr.sin_port=htons(PORT);
        serverAddr.sin_addr.s_addr=inet_addr("127.0.0.1");
        
        // a la place de connect cote client  bind to the port 44557
        
        bind(socketfd, (struct sockaddr *)&serverAddr,sizeof(serverAddr));
        
        //listening  une duree 5 
        listen(socketfd,5);
        printf(" En attente de connexion d'un client \n ");
        addr_size=sizeof(newAddr);
          
        newSocket=accept(socketfd, (struct sockaddr *)&newAddr,&addr_size);
          printf(" Connexion est établiée \n");
        
        char reponse[TAILLE],choix[TAILLE],
   offre[TAILLE];
   Personne p;
        Client cl;
        char id_ticket[TAILLE];
     	
        // recuperation des donnes du client 
        
        //printf("  reponse avant : %s \n",reponse);
        recv(newSocket,reponse,TAILLE,0);
       printf(" reponse: %s \n",reponse);
       
       

       
       if(!notticketexiste(conn,reponse)){
        printf("vous etes client \n");
        supprimerTicket(conn,reponse);
        }
        else{
        printf("vous n'etes pas client");
        }
        

       
       
       
        
       
       
      
       
       
          
  
    
     PQfinish(conn);

   close(newSocket);
    close(socketfd);
   
   
        


    return 0;
}
