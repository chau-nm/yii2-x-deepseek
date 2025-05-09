<p align="center">
   <strong style="font-size:2em">
      Yii2 x DeepSeek
   </strong>
</p>

<hr/>

### SUMMARY

This project is a basic chatbot API built using the DeepSeek platform.

For more information, you can refer to the official DeepSeek API documentation here:</br>
👉 https://api-docs.deepseek.com/

### * NOTE
**`This project has only develop environment.`**

### * REQUIREMENT

<table>
    <thead>
       <tr>
        <td>
            Technical
        </td>
        <td>
            Version
        </td>
       </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                PHP
            </td>  
            <td>
                >=8.4
            </td>        
        </tr>
        <tr>
            <td>
                Docker
            </td>  
            <td>
                *
            </td>  
        </tr>
        <tr>
            <td>
                Composer
            </td>  
            <td>
                *
            </td>        
        </tr>
    </tbody>
</table>

### INSTALL

1. Git clone

```aiignore
git clone https://github.com/chau-nm/yii2-x-deepseek.git
```

2. Docker up

```aiignore
docker compose up -d
```

3. Docker exec

```aiignore
docker compose exec php bash
```

4. Composer install

```aiignore
composer install
```

### ENVIRONMENT
To use this project, you need setup environment variable ( Create .env file or Using ENV var from OS ). You can follow [.env-example](.env-example).

### ENDPOINT
This project has only one endpoint, as shown below:

```aiignore
http://localhost:8080/deep-seek/chat
```
