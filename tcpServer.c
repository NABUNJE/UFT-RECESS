#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <sys/socket.h>
#include <sys/types.h>
#include <netinet/in.h>
#include <arpa/inet.h>

#define PORT 4444

int main(){

	int sockfd, ret;
	 struct sockaddr_in serverAddr;

	int newSocket;
	struct sockaddr_in newAddr;

	socklen_t addr_size;

	char buffer[1024];
	pid_t childpid;

	sockfd = socket(AF_INET, SOCK_STREAM, 0);
	if(sockfd < 0){
		printf("[-]Error in connection.\n");
		exit(1);
	}
	printf("[+]Server Socket is created.\n");

	memset(&serverAddr, '\0', sizeof(serverAddr));
	serverAddr.sin_family = AF_INET;
	serverAddr.sin_port = htons(PORT);
	serverAddr.sin_addr.s_addr = inet_addr("127.0.0.1");

	ret = bind(sockfd, (struct sockaddr*)&serverAddr, sizeof(serverAddr));
	if(ret < 0){
		printf("[-]Error in binding.\n");
		exit(1);
	}
	printf("[+]Bind to port %d\n", 4444);

	if(listen(sockfd, 10) == 0){
		printf("[+]Listening....\n");
	}else{
		printf("[-]Error in binding.\n");
	}


	while(1){
		newSocket = accept(sockfd, (struct sockaddr*)&newAddr, &addr_size);
		if(newSocket < 0){
			exit(1);
		}
		printf("Connection accepted from %s:%d\n", inet_ntoa(newAddr.sin_addr), ntohs(newAddr.sin_port));

		if((childpid = fork()) == 0){
			close(sockfd);

			while(1){
				recv(newSocket, buffer, 1024, 0);
                
				int check = 0;
				char delim[] = " ";
				char *ptr = strtok(buffer, delim);	
				int i = 0;
				char *ptx[10];

				while(ptr!=NULL){							
					ptx[i] = ptr;
					i++;
					ptr = strtok(NULL,delim);
				}
				

				if(strcmp(ptx[0],"Addmember")==0){
					         if(i < 2){
								 buffer[0] = *ptx[0];
								 send(newSocket, buffer, strlen(buffer), 0);
								 bzero(buffer, sizeof(buffer));
							 }
							 else{
								 memberAdd();
							 }
				}
				else if(strcmp(ptx[0],"Check_status")==0){
					status();
				}
				else if(strcmp(ptx[0],"get_statement")==0){
					statement();
				}
				else if(strcmp(ptx[0],"search")==0){
					search();
				}
				else if(strcmp(ptx[0],":exit")==0){
					printf("Disconnected from %s:%d\n", inet_ntoa(newAddr.sin_addr), ntohs(newAddr.sin_port));
					break;
				}
				else{
					buffer[1024] = "UNKNOWN COMMAND!!!! ";//error here
					send(newSocket, buffer, strlen(buffer), 0);
				}


				
			}
		
				
		}

	}


	close(newSocket);
	return 0;


}


        

	


	