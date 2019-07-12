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
        for(int j=0;j<3;j++){
            printf("cell(%d,%d)-",i,j);
            scanf("%d",&sign[i][j]);
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
			char c;
			fp =fopen(file, "r");
			if(fp == NULL){
				send(clientSocket,buffer,1024,0);
			}
			else{  
				bzero(buffer,sizeof(buffer));
				file = "file";
				send(clientSocket,file,sizeof(file),0);
				while((c = getc(fp)) != EOF){
					fscanf(fp,"%s",buffer);
					if(isspace(c) || c =='\t'){
					words++;
					}
				}
				char size[1024];
				sprintf(size,"%d",words);//int to string convertion
				send(clientSocket, size, sizeof(size),0);
				rewind(fp);

				char ch;
				while(ch != EOF){
					fscanf(fp,"%s",buffer);
					send(clientSocket,buffer,1024,0);
		 			ch = fgetc(fp);
				}
				fclose(fp);
               printf("sent successfully\n");

			}
		}	
		
		else if(strcmp(buffer, "search") == 0){
			send(clientSocket, buffer, strlen(buffer), 0);
			scanf("%s",buffer);
			ltrim(buffer);
			send(clientSocket,district,sizeof(district),0);
			send(clientSocket, buffer, strlen(buffer), 0);
            bzero(buffer,sizeof(buffer));

			printf("%s\n",district);
			printf("hix\n");
			//receive search data from the server
			recv(clientSocket,buffer,strlen(buffer),0);

			while(1){
				printf("loop\n");
				recv(clientSocket,buffer,strlen(buffer),0);
				if(strcmp(buffer,"complete")){
					printf("break hit\n");
					break;
					
				}  
				printf("%s\n",buffer);
			}
			
			
		}
		else if(strcmp(buffer, "check_status") == 0){
			send(clientSocket, buffer, sizeof(buffer), 0);
            send(clientSocket,district,sizeof(district),0);
			send(clientSocket,user,sizeof(user),0);


			//check module

		}
		else if(strcmp(buffer, "get_statement") == 0){
			send(clientSocket, buffer, strlen(buffer), 0);
			//statement check
		}
		else{
			printf("[-]ERROR: INVALID COMMAND \n");
		}

        //recv(clientSocket, buffer, 1024, 0);
		//	printf("[-]Error in receiving data.\n");
 

	}
	return 0;
}
