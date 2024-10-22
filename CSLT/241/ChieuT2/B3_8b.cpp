//Bai 3.8.b Viet bang de qui
#include <iostream>
using namespace std;

int X(int n){
	if(n<3)
		return 1;
	return X(n-1)+(n-1)*X(n-2);
}

int main(){
	int n;
	cin>>n;	
	cout<<"X_"<<n<<"="<<X(n);
	return 0;
}
