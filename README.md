# 🛠️ Gerador de Estrutura de Projeto PHP

Este script PHP tem como objetivo **automatizar a criação da estrutura básica** de um projeto web. Ele gera diretórios essenciais, arquivos iniciais e conteúdos padrões como `index.php`, `.env`, e `DB_Config.php`.

---

## 📁 Estrutura Criada

Ao executar o script, os seguintes diretórios e subdiretórios serão criados automaticamente:

```
src/
├── assets/
│   ├── css/
│   └── img/
│   └── classes/
├── data/
├── pages/
└── scripts/
```

Além disso, os seguintes arquivos são gerados com conteúdo pré-definido:

- `src/assets/css/index.css`
- `src/data/DB_Config.php`
- `src/classes/Autoload.php`
- `index.php` (na raiz)
- `.env` (na raiz)
- `.gitignore` (na raiz)

---

## 📄 Descrição do Código

### 🔧 Função `create_directory()`

Função personalizada para criar diretórios recursivamente com permissões `0777`. Ela verifica se o diretório já existe e, se não existir, o cria e exibe mensagens de status no terminal.

```php
function create_directory($directory){
    if(!is_dir($directory)){
        mkdir($directory, 0777, true);
    }
}
```

### 🗂️ Criação de diretórios

Um array chamado `$paths` define os diretórios que devem ser criados. Cada item do array é passado à função `create_directory`.

```php
$paths = array(
    'src',
    'src/assets',
    'src/assets/css',
    'src/assets/img',
    'src/data',
    'src/pages',
    'src/scripts',
    'src/classes',
);
```

### 📃 Criação de arquivos com conteúdo

Os arquivos são criados com conteúdo base:

- **CSS (index.css)**: Reset básico de estilo.
- **DB_Config.php**: Estrutura de conexão com banco de dados usando `PDO`.
- **index.php**: Estrutura HTML com link para o CSS criado.
- **.env**: Variáveis de ambiente para configurar banco de dados e chaves de segurança.
- **.gitignore**: Ignora arquivos sensíveis como `.env`, `log`, `tmp`, e pastas comuns (`node_modules`, `vendor`).
- **Autoload.php**: carrega automaticamente arquivos de classes PHP
---

## 📌 Exemplo de conteúdo criado

### `.env`
```env
#CONFIG DATABASE
DB_HOST=
DB_NAME=
DB_USER=
DB_PASSWD=
DB_PORT=

#SECRET KEY
API_KEY=
JWT_KEY=
```

### `.gitignore`
```gitignore
/node_modules/
/vendor/
.env
*.log
*.tmp
*.cache
```

### `index.php`
```html
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./src/assets/css/index.css"> 
</head>
<body>

</body>
</html>
```

---

## 🚀 Como usar

1. Copie o código para um arquivo `.php`, como `script.php`.
2. Execute com PHP:
   ```bash
   php script.php
   ```
3. A estrutura será criada no diretório onde o script for executado.

---

## 🧩 Requisitos

- PHP 7.0 ou superior
- Permissão de escrita no sistema de arquivos

---

## 📌 Observações

- Este script é ideal para iniciar projetos rapidamente com uma estrutura padrão.
- Pode ser facilmente adaptado para outros frameworks ou projetos mais complexos.
