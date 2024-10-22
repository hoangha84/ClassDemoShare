#include <stdio.h>

int main (){
	int a, b, c, min;
	printf("Nhap 3 so:");
	scanf("%d%d%d", &a, &b, &c);
//	printf("\na, b, c: %d %d %d", a, b, c);
	min = a;
//	min = (b < min) ? b : min;
//	min = (c < min) ? c : min;
	if (b < min) min = b;
	if (c < min) min = c;
	printf("\nMin: %d", min);
	return 0;
}
