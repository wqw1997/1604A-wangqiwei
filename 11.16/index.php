<?phpclass Solution {
    public:
    int FirstNotRepeatingChar(string str) {
        int length = str.size();
        if(length == 0)
            return -1;


        const int tableSize = 256;
        //创建哈希表，并且各元素都初始化为0
       unsigned int hashTable[tableSize];
        for(unsigned int i = 0; i < tableSize; ++i)
            hashTable[i] = 0;

		//char* pChar = new char[tableSize];
		//char* pHashKey = pChar;
        char* pHashKey = &str[0];

		//strcpy(pHashKey,str.c_str());
        //找出每个字符键值对应的个数
        while(*(pHashKey) != '\0')
            hashTable[*(pHashKey++)]++;

        //strcpy(pHashKey,str.c_str());
        pHashKey = &str[0];
        //找到第一个只出现一次的字符
        char resultChar = NULL;
        while(*(pHashKey) != '\0'){
            if(hashTable[*pHashKey] == 1){
                resultChar = *pHashKey;
				break;
			}

            pHashKey++;
        }

		//delete[] pChar;

		if(resultChar == NULL)
            return 0;
        //如果有字符，找出该字符出现的位置
		for(int i = 0; i < length; ++i){
            if(str[i] == resultChar)
                return i;
        }
        return -1;
    }
};

?>