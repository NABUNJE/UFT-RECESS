#include <assert.h>
#include <time.h>
#include <stdio.h>

int main(){

    time_t t = time(NULL);
    struct tm *tm = localtime(&t);
    char s[100];
    assert(strftime(s,sizeof(s),"%d/ %m/ %y",tm));
    printf("%s\n",s);

    return 0;
}