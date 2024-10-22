//3.7.b Tinh tong S = 1^2 + 2^2 + 3^2 +....+ n^2
//Dung de qui
#include <iostream>
using namespace std;

int Tinh(int n){
	//Diem dung:
	if(n==1)
		return 1;
	return Tinh(n-1)+(n*n);
}

int main(){
	int n; cin>>n;
	
	cout<<"S("<<n<<")="<<Tinh(n);
	return 0;
}
