//2.2.b.	Tính t?ng S = 1×2 + 2×3×4 +... + n×(n+1)×...×(2n).
#include <iostream>
using namespace std;

int main(){
	int n;
	cin>>n;
	long s = 0;
		
//	for(int i = 1; i<=n; i++){
//		int tam = 1;
//		for(int j = i; j<=2*i; j++){
//			tam = tam * j;
//		}
//		s = s + tam;
//	}
	int tam = 1;
	for(int i = 1; i<=n; i++){
		if(i>1)
			tam = (tam * ((2*i)-1) * (2*i))/(i-1);
		else
			tam = 2;
		s+=tam;
	}
	
	cout<<"S("<<n<<")="<<s;
	
	return 0;
}
