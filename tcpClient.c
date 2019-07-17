#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <sys/socket.h>
#include <sys/types.h>
#include <netinet/in.h>
#include <arpa/inet.h>
#include <ctype.h>

#define PORT 4444

//search receiver function
void receiver(int clientSocket,char buffer[],char district[]){
	send(clientSocket,district,1024,0);
	send(clientSocket, buffer,1024, 0);
	bzero(buffer,1024);
	char filex[1024];
	int ch = 0;
	//receive search data from the server
	recv(clientSocket, filex, 1024,0);				
	int words = atoi(filex); //string to int conversion
	
	while(ch != words){
		recv(clientSocket, buffer, 1024, 0);
		printf("%s\n",buffer);
		ch++;
	}
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

void sign(){

	int sign[10][10];
    for(int i=0;i<5;i++){
        for(int j=0;j<3;){
            printf("cell(%d,%d)-",i,j);
            scanf("%d",&sign[i][j]);
			if(sign[i][j] == 0 || sign[i][j] == 1){
				j++;
				continue;
			}
			printf("WRONG INPUT\n");
			
        }
    }

    for(int i=0;i<5;i++){
        for(int j=0;j<3;j++){
            if(sign[i][j] == 0){
                printf(" ");
            }
            else{
                printf("*");
            }
            
        }
        printf("\n");
    }
}

int main(){

	int clientSocket, ret;
	struct sockaddr_in serverAddr;
	

	clientSocket = socket(AF_INET, SOCK_STREAM, 0);
	if(clientSocket < 0){
		printf("[-]Error in connection.\n");
		exit(1);
	}
	printf("[+]Client Socket is created.\n");

	memset(&serverAddr, '\0', sizeof(serverAddr));
	serverAddr.sin_family = AF_INET;
	serverAddr.sin_port = htons(PORT);
	serverAddr.sin_addr.s_addr = inet_addr("127.0.0.1");

	ret = connect(clientSocket, (struct sockaddr*)&serverAddr, sizeof(serverAddr));
	if(ret < 0){
		printf("[-]Error in connection.\n");
		exit(1);
	}

	puts("###################################################");
	puts("#       **  **      *******       ********        #");
	puts("#       **  **      *******       ********        #");
	puts("#       **  **      **               **           #");
	puts("#        ****       **               **           #");
	puts("###################################################");
	puts(" WELCOME TO UFT POLITICAL PARTY ENROLLMENT SYSTEM");
  

    char district[1024];
	char user[1024];
    printf("\nENTER DISTRICT:\t");
	scanf("%s",district);
	printf("\nENTER USER NAME:");
    scanf("%s",user);
	while(1){
		char buffer[1024];

		bzero(buffer,sizeof(buffer));
		printf("\nCOMMAND:-> \t");
		scanf("%s", &buffer[0]);

		if(strcmp(buffer, "exit") == 0){
			puts("PLIZ SIGN LIST BEFORE LOGGING OUT");
			sign();//calling the sign module
			send(clientSocket, buffer, strlen(buffer), 0);
			close(clientSocket);
			printf("[-]Disconnected from server.\n");
			exit(1);
		}
		else if(strcmp(buffer, "Addmember") == 0){
			send(clientSocket,buffer,1024,0);
			send(clientSocket,district,sizeof(district),0);
			scanf("%[^\n]s",buffer);
			char *file = buffer;
			ltrim(file);//trimming
			FILE *fp;
			int words = 0;
			fp =fopen(file, "r");
			if(fp == NULL){
				send(clientSocket,buffer,1024,0);
				recv(clientSocket,buffer,1024,0);
				printf("%s\n",buffer);
			}
			else{  
				bzero(buffer,sizeof(buffer));
				file = "file";
				send(clientSocket,file,sizeof(file),0);
				while(fgets(buffer,1024,fp)!=NULL){
					words++;
				}
				printf("%d\n",words);
				
				char size[1024];
				sprintf(size,"%d",words);//int to string convertion
				send(clientSocket, size, sizeof(size),0);
				rewind(fp);

				char ch;
				while(fgets(buffer,1024,fp)!= NULL){
					send(clientSocket,buffer,1024,0);
		 			
				}
				fclose(fp);
               printf("sent successfully\n");

			}
		}	
		
		else if(strcmp(buffer, "search") == 0){
			send(clientSocket, buffer, strlen(buffer), 0);
			scanf("%s",buffer);
			ltrim(buffer);

			//receiver module
            receiver(clientSocket,buffer,district);
		}
		else if(strcmp(buffer, "check_status") == 0){
			send(clientSocket, buffer, sizeof(buffer), 0);
			send(clientSocket, district, sizeof(district), 0);
			send(clientSocket, user, sizeof(user), 0);


		}
		else if(strcmp(buffer, "get_statement") == 0){
			send(clientSocket, buffer, sizeof(buffer), 0);

			//check module
            receiver(clientSocket,user,district);
		}
		else{
			printf("[-]ERROR: INVALID COMMAND \n");
		}

 

	}
	return 0;
}
