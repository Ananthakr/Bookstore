#include<iostream>
#include<iomanip>
#include<fstream>
#include<conio.h>
#include<string.h>
#include<cstdlib>
#include<stdio.h>
int s2=0;
int main();
using namespace std;
class game
{
	public:
		int wic,run,overs,target,flag,f2;
		char curbat[20],curbow[20];
		char t1ply1[20],t1ply2[20],t1ply3[20],t1ply4[20],t1ply5[20],t1ply6[20],t1ply7[20];
		game()
		{
		}
		game(int a,int b,int c,int d,int g,int e=2000)//parameterized constructor
		{
			wic=a; run=b; overs=c;target=e;
			flag=d;f2=g;
		}
		int bat()//one ball in batting
		{
			int sr;
			for(int z=0;z<299999999;z++);
	           system("cls");
	           cout<<setw(680);
			cout<<"dice is rolling\n";
			int sb=1+rand()%6;
			cout<<setw(39);
			cout<<"$$$hit the ball$$$\t";
			cin>>sr;
			if(sr<=6)
			{
			if(sb==sr)
		    	return 'w';
			else 
			   {
				cout<<setw(40)<<"ball.... "<<sb;
				 return sr;
				 }
		    }
		    else
		    return 0;
		}
		int ball()//one ball in bowling
		{
			int sr;
			for(int z=0;z<299999999;z++);
	         system("cls");
	         cout<<setw(680);
			cout<<"dice is rolling\n";
			int sb=1+rand()%6;
			cout<<setw(39);
			cout<<"@@@bowl@@@\t";
			cin>>sr;
			if(sr<=6)
			{
			if(sb==sr)
		    	return 'w';
			else if(flag==2)
			       {
				   cout<<setw(40)<<"shot.... "<<sb;
				   return sb;
				   }
		         else
			       return sr;
		    }
		    else 
		    {
		    	cout<<setw(45)<<"   no ball   \n"; ball();
			}
		}
		void over()//one over for both bating and bowling
		{
			if(flag==1)
			{   cout<<setw(680);
			    system("cls");
				cout<<"current batsmen : "<<curbat<<'\n';
			int i;int tho[6];
			for(int i=0;i<6;i++)
			{
				if((wic!=6)&&(target>=run))
			{
				
				int x=bat();
				if(x==119)
				{
				cout<<"out!!!";
				wic++;
				if(wic!=2)
				batchange();
				}
				else
				{
					run=run+x;
				}
				tho[i]=x;
				
			}
			else
			{ 
			for(int j=i;j<6;j++)
			  tho[j]=0; break;
			}
			}
			for(int z=0;z<399999999;z++);
	           system("cls");
			cout<<"\nthis over  :   ";displayov(tho);
		}
		else if(flag==2)
		{
			system("cls");
		    cout<<setw(680);
			cout<<"\ncurrent bowler : "<<curbow<<'\n';
		int i;int tho[6];
			for(i=0;i<6;i++)
			{
				if((wic!=6)&&(target>=run))
			{
				
				int x=ball();
				if(x==119)
				{
				cout<<'\n'<<setw(45)<<"wow...thats a wicket!!!\t";
				wic++;
				}
				else
				{
					run=run+x;
				}
				tho[i]=x;
			}
			else
			{ 
			  for(int j=i;j<6;j++)
			  tho[j]=0; 
			  break;
			}
			}
			for(int z=0;z<399999999;z++);
	           system("cls");
		cout<<"\nthis over  :   "; displayov(tho);
		}
		}
		void displayov(int a[6])
		{
			for(int i=0;i<6;i++)
            {
            	if(a[i]!=119)
				cout<<a[i]<<"\t";
				else
				cout<<"w\t";
			}
		}
		void match()//one innings
		{
			int j;
			if((wic!=6)&&(target>=run))
			{
			
			for(j=0;j<overs;j++)
			{
				if((wic!=6)&&(target>=run))
			    {
			      if(flag==2)
				    bowlchange();
				  over();
		     	}
		     	else
		     	break;
			}
			}
			for(int z=0;z<399999999;z++);
	           system("cls");
	           cout<<setw(640);
			cout<<"\n\t\t\tinnings over!!!";
			for(int z=0;z<399999999;z++);
	           system("cls");
	           cout<<setw(640);
			cout<<"\n\t\t\tRuns:"<<run<<"\tovers:"<<j;
	}
	void cpy(char p[20],int f)//temp cpy fn
	{
			if(f==1)
			strcpy(curbat,p);
		    else if(f==2)
		    strcpy(curbow,p);
	}
	void batchange()//batsmen changer
	{ int ch;
		if(f2==0)
		{
		for(int z=0;z<399999999;z++);
	    system("cls");
		cout<<setw(680)<<"\nchoose your batsman\n";
		cout<<"1."<<t1ply1<<"  2."<<t1ply2<<"  3."<<t1ply3<<"  4."<<t1ply4<<"  5."<<t1ply5<<"   6."<<t1ply6<<"   7."<<t1ply7;
        cin>>ch;
       }
       else if(f2==1)
       {
       	ch=1+rand()%7;
	   }
		switch(ch)
		{
			case 1: cpy(t1ply1,1); break;
			case 2: cpy(t1ply2,1);break;
			case 3: cpy(t1ply3,1);break;
			case 4: cpy(t1ply4,1);break;
			case 5: cpy(t1ply5,1);break;
			case 6: cpy(t1ply6,1);break;
			case 7: cpy(t1ply7,1);break;
			default: cout<<"wrong input"; batchange();
		}	
	}
	void bowlchange()//bowler changer
	{   int ch;
	   if(f2==0)
	   {
	  for(int z=0;z<399999999;z++);
	    system("cls");
		cout<<setw(680)<<"\nchoose your bowler\n";
		cout<<"1."<<t1ply1<<"   2."<<t1ply2<<"   3."<<t1ply3<<"   4."<<t1ply4<<"   5."<<t1ply5<<"   6."<<t1ply6<<"   7."<<t1ply7;
        cin>>ch;
       }
       else if(f2==1)
       {
       	ch=1+rand()%7;
	   }
		switch(ch)
		{
			case 1: cpy(t1ply1,2); break;
			case 2: cpy(t1ply2,2);break;
			case 3: cpy(t1ply3,2);break;
			case 4: cpy(t1ply4,2);break;
			case 5: cpy(t1ply5,2);break;
			case 6: cpy(t1ply6,2);break;
			case 7: cpy(t1ply7,2);break;
			default: cout<<"wrong input"; bowlchange();
		}	
	}
	void teamc(game o)//temp cpy
	{
		strcpy(t1ply1,o.t1ply1);strcpy(t1ply2,o.t1ply2);strcpy(t1ply3,o.t1ply3);strcpy(t1ply4,o.t1ply4);strcpy(t1ply5,o.t1ply5);strcpy(t1ply6,o.t1ply6);strcpy(t1ply7,o.t1ply7);
	}
	void team()//load team details from file
	{
		int ch; char temp[20];
	     fstream read;read.open("team.txt");
	           system("cls");
	           cout<<setw(680);
	     cout<<"Choose your team\n"<<"\t\t1.CSK\n"<<"\t\t2.KKR\n"<<"\t\t3.MI\n"<<"\t\t4.DD\n"<<"\t\t5.KXIP\n"<<"\t\t6.RR\n"<<"\t\t7.RCB\n"<<"\t\t8.SRH\n"<<"\t\t9.Your Team\t";
	     cin>>ch;
	     switch(ch)
	     {
	     	case 1:read>>t1ply1;read>>t1ply2;read>>t1ply3;read>>t1ply4;read>>t1ply5;read>>t1ply6;read>>t1ply7;break;
	     	case 2:read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;
			       read>>t1ply1;read>>t1ply2;read>>t1ply3;read>>t1ply4;read>>t1ply5;read>>t1ply6;read>>t1ply7;break;
	     	case 3:read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;
			       read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;
			       read>>t1ply1;read>>t1ply2;read>>t1ply3;read>>t1ply4;read>>t1ply5;read>>t1ply6;read>>t1ply7;break;
	     	case 4:read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;
			       read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;
			       read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;
			       read>>t1ply1;read>>t1ply2;read>>t1ply3;read>>t1ply4;read>>t1ply5;read>>t1ply6;read>>t1ply7;break;
	     	case 5:read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;
			       read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;
			       read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;
			       read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;
			       read>>t1ply1;read>>t1ply2;read>>t1ply3;read>>t1ply4;read>>t1ply5;read>>t1ply6;read>>t1ply7;break;
	     	case 6:read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;
			       read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;
			       read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;
			       read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;
			       read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;
			       read>>t1ply1;read>>t1ply2;read>>t1ply3;read>>t1ply4;read>>t1ply5;read>>t1ply6;read>>t1ply7;break;
	     	case 7:read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;
			       read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;
			       read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;
			       read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;
			       read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;
			       read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;
			       read>>t1ply1;read>>t1ply2;read>>t1ply3;read>>t1ply4;read>>t1ply5;read>>t1ply6;read>>t1ply7;break;
	     	case 8:read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;
			       read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;
				   read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;
			       read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;
			       read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;
			       read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;
			       read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;read>>temp;
			       read>>t1ply1;read>>t1ply2;read>>t1ply3;read>>t1ply4;read>>t1ply5;read>>t1ply6;read>>t1ply7;break;
	     	case 9: fstream reed; reed.open("own.txt");
	     	        reed>>t1ply1;reed>>t1ply2;reed>>t1ply3;reed>>t1ply4;reed>>t1ply5;reed>>t1ply6;reed>>t1ply7; reed.close();break;
	     	Default: cout<<"wrong input"; team();
		 }
	 read.close();   
	}
	void statw(int fs)//match stats-writing into a file
	{
		
		if(fs==1)
		{    fstream st; st.open("stat.txt",ios::out); 
			st<<"\t\t1st innings\n\t\tRuns:"<<run<<"\n\t\tOvers:"<<overs<<"\n\t\tWickets:"<<wic;
		st.close();
		}
		else if(fs==2)
		{ fstream st; st.open("stat.txt",ios::app); 
		st<<"\n\t\t2st innings\n\t\tRuns:"<<run<<"\n\t\tOvers:"<<overs<<"\n\t\tWickets:"<<wic;	
		st.close();
		}
	}
	void statr()//match stats-raed from a file
	{
		FILE *fp; fp=fopen("stat.txt","r");
		int rc;
		rc=getc(fp);
		while(rc!=EOF)
		{
			printf("%c",rc);
			rc=getc(fp);
		}
	}
};
toss()//toss using rand()
{   int ch,rr,tt;
    for(int z=0;z<9999999;z++);
	system("cls");
	cout<<setw(680)<<"Its toss time!!!";
	for(int z=0;z<69999999;z++);
	system("cls");
    cout<<setw(680)<<"1.HEAD\n"<<setw(39)<<"2.TAIL";
	cin>>ch;
	rr=1+rand()%2;
	if(ch==rr)
	{   
        cout<<setw(680)<<"You won the toss";
	    for(int z=0;z<49999999;z++);
		system("cls");
		cout<<setw(685)<<"enter your choice\n"<<setw(40)<<"1.Bat  2. Bowl";
     	cin>>tt;
     	return tt;
	}
	else 
	{   
		cout<<setw(680)<<"You lost the toss";
		for(int z=0;z<49999999;z++);
		system("cls");
	return 1+rand()%2;
	}
    	 
}
void settings()//settings menu option
{    char p1[20],p2[20],p3[20],p4[20],p5[20],p6[20],p7[20]; int ch;
     for(int z=0;z<999999;z++);
                system("cls");
	 cout<<setw(600)<<"1.Make your own team\n\n"<<setw(40)<<"2.Player change Auto\n";
	 cin>>ch;
	 for(int z=0;z<999999;z++);
                system("cls");
	 if(ch==1)
	 {
	 	 
	 	fstream ak; ak.open("own.txt",ios::out);
	 cout<<"\nenter the team....\n";
	    cin>>p1>>p2>>p3>>p4>>p5>>p6>>p7; 
	    ak<<p1<<'\t'<<p2<<'\t'<<p3<<'\t'<<p4<<'\t'<<p5<<'\t'<<p6<<'\t'<<p7;
	    ak.close();
	    system("cls");
	   cout<<"done\n"<<"press any key to goto main menu..";
	   getch(); system("cls");
	   main();
	 }
	 switch(ch)
	 {
	  case 1: break;
	   case 2: s2=1;cout<<"done\n"<<"press any key to goto main menu..";
	   getch();
	   main();break;
	   default: cout<<"\nwrong input..."; settings();break; 
}
}
template <class l>
class help : public game//help window option
{
	public:
	l helpfn()
	{
	for(int z=0;z<999999;z++);
                system("cls");
	cout<<"DICE CRICKET is a cricket game based on dice.If the number you enter and the number in the dice are the same, its an out. Otherwise it will be taken as run. Here you can Bat and Bowl.\nYou can also make your own team in settings.\nFor changing bowlers and batsmens automatically goto settings.";
	cout<<setw(400)<<"@Developed by Ananthakumar :p";
	cout<<"\npress any key to goto main menu..";
	   getch();
	   main();
return 0;
}
};
void run()//match control function
{
	 int s1;
	for(int z=0;z<999999;z++);
                system("cls");
	cout<<setw(710)<<"2-> Two overs  4-> Four overs  6-> Six overs ";
	cin>>s1;
	int c2=toss();
    	        switch(c2)
    	        {
				case 1:{
				       game innings1(0,0,s1,1,s2,2000);
				       innings1.team();
				       innings1.batchange();
                       innings1.match();
                       innings1.statw(1);
                       int q=innings1.run;
	                   game innings2(0,0,s1,2,s2,q);
	                   innings2.teamc(innings1);
	                   innings2.match();
	                   innings2.statw(2);
	                   if(innings1.run>innings2.run)
	                    cout<<"\nYou win";
	                   else if(innings1.run==innings2.run)
	                    cout<<"\nMatch draw";
	                   else
	                  cout<<"\nYou lost"; break;
	                   }
	            case 2: {
				       game innings3(0,0,s1,2,s2,2000);
				       innings3.team();
					   innings3.match();
                       int q=innings3.run;
                       innings3.statw(1);
	                   game innings4(0,0,s1,1,s2,q);
	                   innings4.teamc(innings3);
					   innings4.batchange();
					   innings4.match();
					   innings4.statw(2);
	                   if(innings3.run<innings4.run)
	                    {
						for(int z=0;z<599999999;z++);
	                      system("cls");
	                     cout<<setw(680);
						cout<<"You won";
	                     }
					   else if(innings3.run==innings4.run)
	                    {
						for(int z=0;z<599999999;z++);
	                    system("cls");
	                    cout<<setw(680);
						cout<<"Match draw";
	                    }
					   else
					   {
					   for(int z=0;z<599999999;z++);
	                   system("cls");
	                   cout<<setw(680); 
	                  cout<<"You lost"; break;
	                    }
	              }
                }
                for(int z=0;z<599999999;z++);
	           system("cls");
	           cout<<setw(670);
                cout<<"Match Stats\n"; game sta(0,0,0,0,0,0); sta.statr();
          
}
int main()//main() function with menu
{   int i,j,k;
	for(i=1;i<=20;i++)//starting of opening scrolling design
	{
		for(j=1;j<=79;j++)
		{
			if(i<5||i>15||j>10)
			cout<<"*";
		}
		cout<<'\n';
	}
	for(k=0;k<9999999;k++);
	system("cls");
    for(i=1;i<=20;i++)
	{
		for(j=1;j<=79;j++)
		{
			if(i<5||i>15||j>20)
			cout<<"*";
		}
		cout<<'\n';
	}
	for(k=0;k<9999999;k++);
	system("cls");
    for(i=1;i<=20;i++)
	{
		for(j=1;j<=79;j++)
		{
			if(i<5||i>15||j>30)
			cout<<"*";
		}
		cout<<'\n';
	}	
	for(k=0;k<9999999;k++);
	system("cls");
    for(i=1;i<=20;i++)
	{
		for(j=1;j<=79;j++)
		{
			if(i<5||i>15||j>40)
			cout<<"*";
		}
		cout<<'\n';
	}
	for(k=0;k<9999999;k++);
	system("cls");
    for(i=1;i<=20;i++)
	{
		for(j=1;j<=79;j++)
		{
			if(i<5||i>15||j>50)
			cout<<"*";
		}
		cout<<'\n';
	}
	for(k=0;k<9999999;k++);
	system("cls");
    for(i=1;i<=20;i++)
	{
		for(j=1;j<=79;j++)
		{
			if(i<5||i>15||j>60)
			cout<<"*";
		}
		cout<<'\n';
	}
	for(k=0;k<9999999;k++);
	system("cls");
    for(i=1;i<=20;i++)
	{
		for(j=1;j<=79;j++)
		{
			if(i<5||i>15||j>70)
			cout<<"*";
		}
		cout<<'\n';
	}
	for(k=0;k<9999999;k++);
	system("cls");
    for(i=1;i<=20;i++)
	{
		for(j=1;j<=79;j++)
		{
			if(i<5||i>15||j>80)
			cout<<"*";
		}
		cout<<'\n';
	}//ending of opening scrolling design
	for(k=0;k<99999999;k++);
	system("cls");
	cout<<setw(680)<<"DICE CRICKET";
    for(k=0;k<99999999;k++);
	system("cls");
     int c1;
    cout<<setw(690)<<"welcome to dice cricket";
    for(int z=0;z<29999999;z++);
    system("cls");
    cout<<setw(680)<<"1.Play\n"<<setw(42)<<"2.Settings\n"<<setw(40)<<"3.Help\n"<<setw(40)<<"4.Exit\n";
    cin>>c1;
    if(c1==1)
        	{
        		run();
        		cout<<"\n\npress any key to goto main menu..";
	   getch(); system("cls");
	   main();
	        }
            else if(c1==2)
            {
            	for(int z=0;z<999999;z++);
                system("cls");
			cout<<setw(680)<<"Settings";
			
            settings();}
            else if(c1==3)
            {
            	for(int z=0;z<999999;z++);
                system("cls");
			cout<<"Help"; help<int> ak; ak.helpfn();
			}
            else if(c1==4)
            exit(0);
            else
            {
			cout<<"wrong input....Exiting"; }
    return 0;
}
