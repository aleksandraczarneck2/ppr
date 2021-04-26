/*
 * This is sample code generated by rpcgen.
 * These are only templates and you can use them
 * as a guideline for developing your own functions.
 */

#include "add.h"


void
add_p_1(char *host, int a, int b)
{
	CLIENT *clnt;
	int  *result_1;
	input  add_1_arg;

#ifndef	DEBUG
	clnt = clnt_create (host, ADD_P, ADD_V, "udp");
	if (clnt == NULL) {
		clnt_pcreateerror (host);
		exit (1);
	}
#endif	/* DEBUG */
	add_1_arg.a = a;
	add_1_arg.b = b;
	result_1 = add_1(&add_1_arg, clnt);
	if (result_1 == (int *) NULL) {
		clnt_perror (clnt, "call failed");
	}
	else
	{
		printf("result: %d\n",*result_1);
	}
#ifndef	DEBUG
	clnt_destroy (clnt);
#endif	 /* DEBUG */
}


int
main (int argc, char *argv[])
{
	char *host;

	if (argc < 4) {
		printf ("usage: %s server_host number number\n", argv[0]);
		exit (1);
	}
	host = argv[1];
	add_p_1 (host,atoi(argv[2]),atoi(argv[3]));
exit (0);
}
