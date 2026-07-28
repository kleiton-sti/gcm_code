# CLAUDE.md — Mapa do Projeto `gcm_code`

## Tecnologias utilizadas

- **Backend:** PHP 8.2+ com **Laravel 12**
- **Frontend/Build:** **Vite 6**, **Bootstrap 5**, Axios
- **Templates:** Blade (`.blade.php`)
- **Banco de dados:** Mysql, com suporte a outros drivers via `config/database.php`
- **Testes:** Pest 4 (com plugin `pest-plugin-laravel`), PHPUnit
- **Dependências dev:** Laravel Pint (code style), Laravel Sail, Laravel Pail (logs), Faker, Mockery, Collision
- **Gerenciadores de pacote:** Composer (PHP) e NPM (JS)

## Contexto do projeto

Sistema de gestão de crachás/QR Code para controle de acesso de colaboradores (funcionários da STII, da SEMOB e de empresa terceirizada responsável pela confecção dos crachás). Inclui cadastro de colaboradores (foto, nome, matrícula, CPF, QR Code) e cadastro de usuários com diferentes níveis de acesso (ver `gcm_code.txt` na raiz para as regras de negócio detalhadas).

## Mapa da estrutura do projeto

```
gcm_code/
├── app/                        # Código-fonte principal da aplicação (padrão Laravel)
│   ├── Http/
│   │   ├── Controllers/        # Controllers HTTP (apenas o Controller.php base até o momento)
│   │   └── Requests/           # Form Requests de validação:
│   │                           #   - CadastroGCMRequest.php (validação do cadastro de colaborador/crachá)
│   │                           #   - CadastroUsuarioRequest.php (validação do cadastro de usuário)
│   ├── Models/                 # Models Eloquent (apenas User.php e GuardaCivil.php até o momento)
│   └── Providers/              # Service Providers da aplicação
│   |__ Rules/                  # Validadores de regras de negócio
|           
├── bootstrap/                  # Bootstrap do framework (cache, app.php)
│
├── config/                     # Arquivos de configuração (app, auth, database, session, etc.)
│
├── database/
│   ├── database.sqlite         # Banco de dados SQLite local
│   ├── factories/              # Model Factories (dados fake para testes/seed)
│   ├── migrations/             # Migrations (users, cache, jobs, guardas_civil)
│   └── seeders/                # Seeders do banco de dados
│
├── public/                     # Document root público (index.php, assets compilados)
│
├── resources/
│   ├── css/                    # Estilos (Tailwind)
│   ├── js/                     # JavaScript/Vite
│   └── views/                  # Views Blade (apenas welcome.blade.php até o momento)
│
├── routes/
│   ├── console.php             # Rotas/comandos de console (Artisan)
│   └── web.php                 # Rotas web (ainda apenas a rota raiz "/")
│
├── storage/                    # Armazenamento de logs, cache, sessões, uploads
│
├── tests/                      # Testes automatizados (Pest/PHPUnit)
│
├── vendor/                     # Dependências PHP instaladas via Composer
├── node_modules/               # Dependências JS instaladas via NPM
│
├── artisan                     # CLI do Laravel
├── composer.json / composer.lock  # Dependências e scripts PHP
├── package.json / package-lock.json # Dependências e scripts JS
├── vite.config.js              # Configuração do Vite (+ plugin Laravel e Tailwind)
├── phpunit.xml                 # Configuração de testes
├── .env / .env.example         # Variáveis de ambiente
├── gcm_code.txt                # Especificação/requisitos de negócio do sistema
└── README.md                   # Readme padrão do Laravel
```

# Convenções obrigatórias

## Idioma

- Todo o código deve utilizar nomes em português.
- Variáveis, funções, classes, métodos, propriedades e arquivos devem utilizar termos em português.
- Exceções são permitidas apenas para APIs, bibliotecas, frameworks e padrões amplamente consolidados.

## Nomenclatura

- Todo nome deve explicar claramente sua responsabilidade.
- O nome deve indicar por que o elemento existe, o que faz e como é utilizado.
- Se um nome precisar de comentário para ser entendido, ele deve ser renomeado.
- Prefira nomes descritivos em vez de nomes curtos.
- O tamanho do nome deve ser proporcional ao seu escopo.
- Evite abreviações desnecessárias.
- Nunca utilize numeração sequencial (`item1`, `item2`, `dados3`).
- Não utilize nomes genéricos (`temp`, `valor`, `obj`, `data`, `lista`, `teste`) quando um nome específico for possível.
- Conceitos iguais devem utilizar exatamente o mesmo termo em todo o projeto.
- Um mesmo verbo deve representar sempre a mesma ação (`adicionar` sempre adiciona, `criar` sempre cria, `buscar` sempre busca).
- Utilize nomes alinhados ao domínio do negócio.
- Todo nome deve continuar fazendo sentido mesmo quando visto isoladamente.


# Princípios de Desenvolvimento

## Responsabilidade Única (SRP)

- Siga rigorosamente o Princípio da Responsabilidade Única (SRP).
- Garanta que cada classe possua apenas uma responsabilidade bem definida.
- Garanta que cada função ou método execute apenas uma tarefa.
- Divida funções ou classes sempre que identificar mais de uma responsabilidade.
- Prefira separar responsabilidades em componentes menores a concentrar múltiplas responsabilidades em um único arquivo.

## Funções

- Escreva funções pequenas, simples e altamente coesas.
- Mantenha cada função em um único nível de abstração.
- Não misture regras de negócio com detalhes de implementação na mesma função.
- Prefira funções sem parâmetros.
- Quando necessário, utilize apenas um parâmetro.
- Evite funções com dois ou mais parâmetros. Caso isso seja inevitável, avalie encapsular os dados em um DTO, Value Object ou objeto de contexto do domínio.
- Não crie abstrações artificiais apenas para reduzir a quantidade de parâmetros.
- Extraia responsabilidades auxiliares para funções privadas ou serviços especializados.
- Faça com que cada função possa ser compreendida rapidamente durante a leitura.

## Tratamento de Erros

- Implemente tratamento completo de erros em toda operação suscetível a falhas.
- Utilize `try/catch` sempre que houver acesso a banco de dados, APIs, sistema de arquivos, serviços externos ou qualquer operação que possa lançar exceções.
- Nunca ignore ou silencie exceções.
- Registre toda exceção capturada utilizando o sistema de logs da aplicação.
- Inclua nos logs, sempre que possível:
  - mensagem descritiva;
  - tipo da exceção;
  - stack trace;
  - contexto da operação;
  - identificadores relevantes para diagnóstico.
- Utilize corretamente os níveis de log (`debug`, `info`, `warning` e `error`).
- Nunca exponha detalhes internos de exceções ao usuário final.
- Lance exceções de domínio quando elas representarem melhor o problema do que exceções de infraestrutura.

## Qualidade do Código

- Priorize legibilidade em vez de código excessivamente compacto.
- Escreva código para ser facilmente compreendido por outro desenvolvedor.
- Evite duplicação de código (DRY).
- Prefira composição em vez de herança quando apropriado.
- Evite abstrações prematuras.
- Preserve ou melhore a qualidade do código sempre que realizar alterações.
- Produza código consistente com os padrões já adotados pelo projeto.
- Antes de concluir uma implementação, revise o código buscando oportunidades de simplificação, extração de responsabilidades e melhoria da legibilidade.

