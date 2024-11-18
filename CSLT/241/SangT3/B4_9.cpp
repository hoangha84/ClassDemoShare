//4.9 m dong, n cot
#include <iostream>
#include <stdlib.h>
#include <time.h>
using namespace std;
#define max 500

void nhapNN(int a[][max], int &m, int &n){
	cin>>m>>n;
	for(int i=0; i<m; i++)
		for(int j=0; j<n; j++){
			int tam = rand() % 100;
			if(tam<10) tam+=10;		
			a[i][j] = tam;	
		}			
	return;
}

void xuat(int a[][max], int m, int n){
	for(int i=0; i<m; i++){	
		for(int j=0; j<n; j++)	
			cout<<a[i][j]<<" ";
		cout<<endl;
	}
	return;
}

//4.9.c Tim gia tri max
void gtln(int a[][max], int m, int n){
	int tam = a[0][0];
	int x=0, y=0;
	for(int i=0; i<m; i++)
		for(int j=0; j<n; j++)
			if(a[i][j]>tam){
				tam = a[i][j];
				x=i; y=j;
			}				
	cout<<"\nGia tri max: "<<tam<<" tai hang thu "<<x+1<<", cot thu "<<y+1;
	return;
}

int main(){
	int a[max][max];
	int m, n;
	
	nhapNN(a,m,n);
	xuat(a,m,n);
	
	gtln(a,m,n);
	return 0;
}

