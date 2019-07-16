#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <sys/socket.h>
#include <sys/types.h>
#include <netinet/in.h>
#include <arpa/inet.h>
#include <ctype.h>
#include <time.h>



#define PORT 4444

int splitter(char data[],char check[],char dis[]){
	char delim[] = ",";
	char *ptr = strtok(data, delim);  
	int i = 0;
	char *ptx[10];
	while(ptr!=NULL){                                
		ptx[i] = ptr;
		i++;
		ptr = strtok(NULL,delim);
	}

	//check if recommender exists in file

	 	FILE *fptr;
		char pitem[1024];
		char location[1024];
		sprintf(location,"UFT/storage/app/recommender/%s.txt",dis);

	fptr = fopen(location,"r");
		if(fptr ==NULL){
			printf("file not found \n");
			exit(EXIT_FAILURE);
		}
		while(fgets(pitem,1024,fptr)!=NULL){
			int totalRead = strlen(pitem);

			pitem[totalRead - 1] = pitem[totalRead - 1] == '\n' ? '\0' : pitem[totalRead - 1];
			if(strstr(pitem,ptx[2])!=NULL){
				strcpy(check,"ok");
				break;

			}
		}

	return 0;

}
int currdate(char timex[]){
    time_t t = time(NULL);
    struct tm *tm = localtime(&t);
    strftime(timex,1024,"%y-%m-%d",tm);
	return 0;
}

int addmember(char arr[],char dis[],char dater[]){
	char location[1024];
	sprintf(location,"UFT/storage/app/enrollments/%s.txt",dis);

	FILE *fp;
	   fp =fopen(location,"a");
	   //sprintf(arr,"%s %s %s %s",arr[0],dater,arr[1],arr[2]);
	   sprintf(arr,"%s %s",arr,dater);
	   fputs(arr,fp);
	   fputs("\n",fp);
	   fclose(fp);

	return 0;
}


//triming of the strings 
void ltrim(char str[])
{
        int i = 0, j = 0;
        char buf[1024];
        strcpy(buf, str);
        for(;str[i] == ' ';i++);

        for(;str[i] != '\0';i++,j++)
                buf[j] = str[i];
        buf[j] = '\0';
        strcpy(str, buf);
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
				char district[1024];
				char user[1024];

				char cdate[1024];

				currdate(cdate);

				int readx = recv(newSocket,buffer,1024,0);
		        buffer[readx] = '\0';

				if(strcmp(buffer, "Addmember") == 0){
					recv(newSocket,district,1024,0);
					readx = recv(newSocket,buffer,1024,0);
					buffer[readx] = '\0';
					if(strcmp(buffer,"file") ==0){
						bzero(buffer,sizeof(buffer));
						FILE *fp;
						int ch = 0;
						char filex[1024];
						char location[1024];
						sprintf(location,"UFT/storage/app/enrollments%s.txt",district);
						fp =fopen(location,"a");
						recv(newSocket, filex, sizeof(filex),0);
						int words = atoi(filex); //string to int conversion
						printf("%d",words);
						while(ch != words){
							recv(newSocket,buffer,1024,0);
							fprintf(fp, "%s " ,buffer);
							ch++;
						}
						fputs("\n",fp);
						fclose(fp);


					}
					else{
						char test[1024];
						strcpy(test,buffer);
						char check[100] = "fail";

						//splitting and checking the recommender
						splitter(test,check,district);

                        if(strcmp(check,"ok")==0){
							addmember(buffer,district,cdate);
							sprintf(buffer,"COMMAND SUCCESFUL");
							send(newSocket,buffer,sizeof(buffer),0);

						}
						else{
							sprintf(buffer,"RECOMMENDER NOT FOUND IN DATABASE");
							send(newSocket,buffer,sizeof(buffer),0);


						}
						
					}
					
				}
				else if(strcmp(buffer, "search") == 0){
					recv(newSocket,district,1024,0);
					readx = recv(newSocket,buffer,1024,0);
					buffer[readx] = '\0';
					printf("%s\n",district);
					   //call the search module
	    				FILE *fptr;
						char pitem[1024];

                        char location[1024];
						sprintf(location,"UFT/storage/app/enrollments%s.txt",district);
						fptr = fopen(location,"r");
 
						if(fptr ==NULL){
							printf("file not found \n");
							exit(EXIT_FAILURE);
						}

						while(fgets(pitem,1024,fptr)!=NULL){
							int totalRead = strlen(pitem);

							pitem[totalRead - 1] = pitem[totalRead - 1] == '\n' ? '\0' : pitem[totalRead - 1];

							if(strstr(pitem,buffer)!=NULL){
								printf("%s\n",pitem);

								send(newSocket,pitem,sizeof(pitem),0);
					
							}

						}
						char *fin ="complete";
						send(newSocket,fin,sizeof(fin),0);


				}
				else if(strcmp(buffer, "check_status") == 0){
					bzero(buffer,sizeof(buffer));
					recv(newSocket,district, sizeof(district),0);
					recv(newSocket, user, sizeof(user),0);
					

				}
				else if(strcmp(buffer, "get_statement") == 0){
					printf("statement\n");
				}

				else if(strcmp(buffer, "exit") == 0){
					printf("Disconnected from %s:%d\n", inet_ntoa(newAddr.sin_addr), ntohs(newAddr.sin_port));
				}
			}
		}

	}

	close(newSocket);

	return 0;
}
