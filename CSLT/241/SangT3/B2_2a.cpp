//2.2.a.	Tính t?ng S = 1 + 1×2 + 1×2×3 +... +1×2×3×...×n.
#include <iostream>
using namespace std;

int main(){
	int n; cin>>n;
	int s = 0;
//	for(int i = 1; i<=n; i++){
//		int tam = 1;
//		for(int j = 1; j<=i; j++){
//			tam = tam * j;
//		}
//		s = s + tam;
//	}

	int tam = 1;
	for(int i = 1; i<=n; i++){
		tam*=i;
		s+=tam;
	}
	
	cout<<"S("<<n<<")="<<s;
	return 0;
}
