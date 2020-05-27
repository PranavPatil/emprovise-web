/*

-- The implementation provide the ability to extract comments from source
   files supplied by the user and present them without the non-comment text
   in the output text file. 
   
*/

#include < stdlib.h >
#include < stdio.h >
#include < ctype.h >
#include < string.h >
int extract_c_cmts(char **);
//void inside_c_cmt(int);
int main(int argc, char **argv)
{
        register int i;
        i = extract_c_cmts(argv);
        putc(i, stdout);
        putc('\n', stdout);
        return 0;
}


int extract_c_cmts(char **argv)
{
    register int chi, cht;
    int count;                          /* count = comment count            */
    FILE *infile = fopen(argv[1], "r+");
    FILE *outfile = fopen(argv[2], "w");
    count = 0;
    chi = getc(infile);
    while(chi != EOF)                       /* as long as there is input... */
    {
        if(chi == '/')                      /* process comments             */
        {
            cht = getc(infile);
            if(cht == EOF)
                return(count);
            if(cht == '*' || cht == '/')    /* if start of a comment...     */
            {
                                putc('-',outfile);
                                count++;                    /* count it and                 */
                                int  ch=cht;
                                register int chi, cht;
                                if(ch == '/')                           /* make ch = '\n' if C++        */
                                ch = '\n';
                                chi = getc(infile);
                                while(chi != EOF)                       /* as long as there is input... */
                                {                                       /* process comments             */
                                    if(chi == ch)
                                    {
                                        if(ch == '\n')                  /* if C++ comment is ended...   */
                                            goto end;                      /* stop outputting              */
                                        cht = getc(infile);
                                          if(cht == '/')                  /* if C comment is ended...     */
                                          {
                                           putc('\n',outfile);
                                           goto end;                     /* stop outputting              */
                                          }
                                          else
                                          {
                                            ungetc(cht, infile);
                                            putc(chi, outfile);
                                          }
                                    }
                                    else
                                    putc(chi, outfile);
                                    chi = getc(infile);
                                }
           /* output all of the comment    */
            }
            else
            ungetc(cht, infile);
        }
//        if ('\n' == chi)
        end:
        chi = getc(infile);                  /* continue scanning input     */
    }
    return(count);
}
