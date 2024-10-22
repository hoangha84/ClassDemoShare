//3.1g.	Hãy tìm các s? Mersenne nh? h?n ho?c b?ng n.
#include <iostream>
#include <cmath>
using namespace std;

int laNT(int n){
	if(n<2)
		return 0;
	for(int i=2; i<n; i++)
		if(n%i==0){
//			cout<<i;
			return 0;
		}
			
	return 1;
}

int laMersenne(int n){
	//n la SNT
	if(!laNT(n)) // if(laNT(n)==0)
		return 0;	
	//n co dang 2^i - 1 và i la SNT
	int i = 1;
	while(pow(2,i)-1 < n)
		i++;	
	if(pow(2,i)-1 == n) //n co dang 2^i - 1
		if(laNT(i))
			return 1;			
	return 0;
}

int laMersenneImprove(int n){
	//n co dang 2^i - 1 và i la SNT
	int i = 1;
	while(pow(2,i)-1 < n)
		i++;	
	if(pow(2,i)-1 == n) //n co dang 2^i - 1
		if(laNT(i))
			if(laNT(n))	//Kiem tra n la SNT
				return 1;
	return 0;
}

int main(){
	int n; cin>>n;
//	cout<<laNT(n);
	for(int i = 1; i<=n; i++)
//		if(laMersenne(i))
		if(laMersenneImprove(i))
			cout<<i<<" ";
	
	return 0;
}
