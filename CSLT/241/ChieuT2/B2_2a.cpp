//Bai 2.2: a.	T�nh t?ng S = 1 + 1�2 + 1�2�3 +... +1�2�3�...�n.
#include <iostream>
using namespace std;

int main(){
	int n;
	cin>>n;
	int tam; 
	int s = 0;
	//Cach 1
//	for(int i = 1; i<=n; i++){
//		tam=1;
//		for (int j=1; j<=i; j++){
//			tam = tam * j;
//		}
//		s = s + tam;
//	}
	
	//Cach 2
	tam=1;
	for(int i = 1; i<=n; i++){
		tam*=i;
		s+=tam;
	}
	
	cout<<"S_"<<n<<"="<<s;
	
	return 0;
}
