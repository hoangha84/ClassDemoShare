//3.7.a Tinh tong S = 1 + 2 + 3 +....+ n
//Dung de qui
#include <iostream>
using namespace std;

int TinhTong(int n){
	//Diem dung:
	if(n==1)
		return 1;
	//Cong thuc de qui: S(n) = S(n-1) + n
	return TinhTong(n-1)+n;
}

int main(){
	int n; cin>>n;
	
	cout<<"S("<<n<<")="<<TinhTong(n);
	return 0;
}
