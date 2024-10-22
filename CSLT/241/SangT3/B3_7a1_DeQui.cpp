//3.7.a1 Tinh tich S = 1 * 2 * 3 *....* n
//Dung de qui
#include <iostream>
using namespace std;

int Tinh(int n){
	//Diem dung:
	if(n==1)
		return 1;
	return Tinh(n-1)*n;
}

int main(){
	int n; cin>>n;
	
	cout<<"S("<<n<<")="<<Tinh(n);
	return 0;
}
