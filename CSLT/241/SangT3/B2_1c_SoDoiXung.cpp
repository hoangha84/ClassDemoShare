//So doi xung
#include <iostream>
using namespace std;

int DaoNguoc(int n){
	int sodao = 0;
	while(n>0){
		sodao = (sodao * 10) + (n%10);
		n/=10;
	}
	return sodao;
}

int main(){
	int n;
	cin>>n;
	//if(n==DaoNguoc(n))
	int sodaonguoc = DaoNguoc(n);
	if(n==sodaonguoc)
		cout<<n<<" la so doi xung";
	else
		cout<<n<<" khong phai la so doi xung";

	return 0;
}
