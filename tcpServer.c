#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <sys/socket.h>
#include <sys/types.h>
#include <netinet/in.h>
#include <arpa/inet.h>

#define PORT 4444

int addmember(char arr[]){
	FILE *fp;
	   fp =fopen("district.txt","a");

	   fputs(arr,fp);
	   fputs("\n",fp);
	   fclose(fp);

	return 0;
}

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
				int readx = recv(newSocket,buffer,1024,0);
		        buffer[readx] = '\0';

				if(strcmp(buffer, "Addmember") == 0){
					readx = recv(newSocket,buffer,1024,0);
					buffer[readx] = '\0';
					if(strcmp(buffer,"file") ==0){
						bzero(buffer,sizeof(buffer));
						FILE *fp;
						int ch = 0;
						int word =0;
						fp =fopen("hello.txt","a");
						recv(newSocket, &word, sizeof(word),0);
						int words = ntohl(word);
						while(ch != words){
							recv(newSocket,buffer,1024,0);
							fprintf(fp, "%s" ,buffer);
							printf("%s : %d",buffer,ch);
							ch++;
						}
						fputs("\n",fp);
						printf("file received \n");


					}
					else{
						addmember(buffer);
					}
					
				}
				else if(strcmp(buffer, "search") == 0){

				}
				else if(strcmp(buffer, "check_status") == 0){

				}
				else if(strcmp(buffer, "get_statement") == 0){
					printf("statement\n");
				}

				else if(strcmp(buffer, "exit") == 0){
					printf("Disconnected from %s:%d\n", inet_ntoa(newAddr.sin_addr), ntohs(newAddr.sin_port));
				}
			
		        /* else{
				send(newSocket, buffer, strlen(buffer), 0);
				}
				*/
			}
		}

	}

	close(newSocket);

	return 0;
}
