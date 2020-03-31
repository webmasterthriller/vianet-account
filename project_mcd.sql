-- User contient les données d'auth des acteurs */
CREATE TABLE IF NOT EXISTS User(
	user_id VARCHAR(10) NOT NULL,-- VAUSR00001*/
	user_name VARCHAR(20) NOT NULL,-- VAUSR00001*/
	user_pwd TEXT NOT NULl,-- USR0001*/
	user_email TEXT NOT NULL,-- vausr00001@vauser.com CONCAT(User.name,'@vauser.com')*/
	user_date DATE NOT NULL,-- 01.01.2020*/
	user_statut ENUM('ON','OFF'),-- ON*/
	PRIMARY KEY(user_id),
	UNIQUE KEY(user_name)
);

-- Garant est un User capable de donner des Loan à un Client */
CREATE TABLE IF NOT EXISTS Garant(
    gar_id VARCHAR(10) NOT NULL,
    gar_user VARCHAR(10) NOT NULL,
    gar_civilite ENUM('M.','Mlle','Mme') NOT NULL,
    gar_nom TEXT NOT NULL,
    gar_prenom TEXT NOT NULL,
    gar_adresse TEXT NOT NULL,
    gar_code_postal TEXT NOT NULL,
    gar_pays TEXT NOT NULL,
    gar_telephone INT(20) NOT NULL,
    gar_approbation BOOL,
    FOREIGN KEY (gar_user) REFERENCES User(user_id) ON DELETE CASCADE,
    PRIMARY KEY (gar_id),
    UNIQUE KEY (gar_telephone)
);

-- Client est un User capable de recevoir un Loan */
CREATE TABLE IF NOT EXISTS Client(
    cli_id VARCHAR(10) NOT NULL,
    cli_user VARCHAR(10) NOT NULL,
    cli_garant VARCHAR(10) NOT NULL,
    cli_civilite ENUM('M.','Mlle','Mme') NOT NULL,
    cli_nom TEXT NOT NULL,
    cli_prenom TEXT NOT NULL,
    cli_adresse TEXT NOT NULL,
    cli_code_postal TEXT NOT NULL,
    cli_pays TEXT NOT NULL,
    cli_telephone INT(20) NOT NULL,
    cli_approbation BOOL NOT NULL,
    FOREIGN KEY (cli_user) REFERENCES User(user_id) ON DELETE CASCADE,
    FOREIGN KEY (cli_garant) REFERENCES Garant(gar_id),
    PRIMARY KEY (cli_id),
    UNIQUE KEY (cli_telephone)
);

-- Account est le compte d'un Client */
CREATE TABLE IF NOT EXISTS Account(
	account_id INT(9) NOT NULL,
	account_client VARCHAR(10) NOT NULL,
	account_balance INT NOT NULL,
	account_credit INT NOT NULL,
	account_debit INT NOT NULL,
	account_statut BOOLEAN NOT NULL,
	FOREIGN KEY (account_client) REFERENCES Client(client_id) ON DELETE CASCADE,
	PRIMARY KEY(account_id),
	UNIQUE KEY(account_user)
);

-- Wallet est le portefeuille d'un Garant */
CREATE TABLE IF NOT EXISTS Wallet(
	wal_id INT(9) NOT NULL,
	wal_name VARCHAR(20) NOT NULL,
	wal_balance INT NOT NULL,
	wal_garant INT(9) NOT NULL,
	FOREIGN KEY (wal_garant) REFERENCES Garant(gar_id) ON DELETE CASCADE,
	PRIMARY KEY (wal_id)
);

-- Rib est le RIB du Account d'un User */
CREATE TABLE IF NOT EXISTS Rib(
	rib_id VARCHAR(10) NOT NULL, -- VARIB00001*/
	rib_provider TEXT NOT NULL, -- VIANET ACCOUNT*/
	rib_iban VARCHAR(34) NOT NULL,-- FR36 12345 56789 12345678910 89*/
	rib_swift VARCHAR(11) NOT NULL, -- BANKSW01*/
	rib_account INT(9) NOT NULL, -- 12345678910,*/
	FOREIGN KEY (rib_account) REFERENCES Account(account_id) ON DELETE CASCADE,
	PRIMARY KEY(rib_id)
);

-- Access est l'accès au RIB en ligne */
CREATE TABLE IF NOT EXISTS Access(
	acc_id VARCHAR(10) NOT NULL, -- RIBSEC001*/
	acc_username TEXT NOT NULL, -- SHA1(ribusr001)*/
	acc_pwd TEXT NOT NULL, -- SHA1(ribpwd001)*/
	acc_rib INT(9) NOT NULL, -- VARIB00001*/
	FOREIGN KEY (acc_rib) REFERENCES Rib(rib_id) ON DELETE CASCADE,
	PRIMARY KEY(acc_id)
);

-- Card est la carte bancaire liée à un Account */
CREATE TABLE IF NOT EXISTS Card(
	card_id VARCHAR(10) NOT NULL,
	card_number BIG INT(16) NOT NULL,
	card_type TEXT NOT NULL,
	card_date_on DATE NOT NULL,
	card_date_off DATE NOT NULL,
	card_crypto INT(3) NOT NULL,
	card_account INT(9) NOT NULL,
	card_statut BOOLEAN,
	FOREIGN KEY (card_account) REFERENCES Account(account_id) ON DELETE CASCADE,
	PRIMARY KEY(card_id)
);

-- Loan est la somme tirée du Wallet d'un Garant et reverser dans le Account d'un Client */
CREATE TABLE IF NOT EXISTS Loan(
	loan_id VARCHAR(10) NOT NULL,
	loan_from VARCHAR(10) NOT NULL,
	loan_to VARCHAR(10) NOT NULL,
	loan_type VARCHAR(10) NOT NULL,
	loan_montant INT NOT NULL,
	loan_date_debut DATE NOT NULL,
	loan_date_finition DATE,
	loan_from VARCHAR (10) NOT NULL,
	FOREIGN KEY (loan_from) REFERENCES Wallet(wal_id) ON DELETE CASCADE,
	FOREIGN KEY (loan_to) REFERENCES Account(account_id) ON DELETE CASCADE,
	PRIMARY KEY (loan_id)
);

CREATE TABLE IF NOT EXISTS Operation(
	cost_id VARCHAR(10) NOT NULL,
	cost_type VARCHAR(10) NOT NULL,
	cost_libelle TEXT NOT NULL,
	cost_taxe INT NOT NULL,
	FOREIGN KEY (cost_type) REFERENCES Operation(op_id) ON DELETE CASCADE,
	PRIMARY KEY (cost_id)
);

-- Transaction est un flux monétaire facturé par Operation et effectué par un Account */
CREATE TABLE IF NOT EXISTS Transaction(
	tr_id VARCHAR (10) NOT NULL,
	tr_number VARCHAR (10) NOT NULL,
	tr_type VARCHAR (10) NOT NULL,
	tr_montant INT NOT NULL,
	tr_date_debut DATE NOT NULL,
	tr_date_finition DATE,
	tr_account INT(9),
	FOREIGN KEY (tr_type) REFERENCES Operation(op_id),
	FOREIGN KEY (tr_account) REFERENCES Account(account_id),
	PRIMARY KEY (tr_id),
	UNIQUE KEY (tr_number)
);

-- File
CREATE TABLE IF NOT EXISTS File(
	file_id VARCHAR(10) NOT NULL,
	file_name TEXT NOT NULL,
	file_message
	PRIMARY KEY (file_id)
);

-- Message est un Message entre deux User et possédant un FileBase */
CREATE TABLE IF NOT EXISTS Message(
	msg_id VARCHAR (10) NOT NULL,
	msg_type ENUM('in','out','self'),
	msg_from VARCHAR (10) NOT NULL,
	msg_to VARCHAR (10) NOT NULL,
	msg_subject TEXT NOT NULL,
	msg_content TEXT NOT NULL,
	msg_date DATE NOT NULL,
	msg_lecture BOOL,
	msg_date_lecture DATE NOT NULL,
	FOREIGN KEY (msg_file_base) REFERENCES FileBase(base_id),
	FOREIGN KEY (msg_from) REFERENCES User(user_id),
	FOREIGN KEY (msg_to) REFERENCES User(user_id),
	PRIMARY KEY (msg_id)
);

-- php artisan make:migration create_user_table --create=user
-- php artisan make:controller userController --resource --model=User

-- php artisan make:migration create_garant_table --create=garant
-- php artisan make:controller garantController --resource --model=Garant

-- php artisan make:migration create_wallet_table --create=wallet
-- php artisan make:controller walletController --resource --model=Wallet

-- php artisan make:migration create_client_table --create=client
-- php artisan make:controller clientController --resource --model=Client

-- php artisan make:migration create_account_table --create=account
-- php artisan make:controller accountController --resource --model=Account

-- php artisan make:migration create_rib_table --create=rib
-- php artisan make:controller ribController --resource --model=Rib

-- php artisan make:migration create_card_table --create=card
-- php artisan make:controller cardController --resource --model=Card

-- php artisan make:migration create_operation_table --create=operation
-- php artisan make:controller operationController --resource --model=Operation

-- php artisan make:migration create_transaction_table --create=transaction
-- php artisan make:controller transactionController --resource --model=Transaction

-- php artisan make:migration create_message_table --create=message
-- php artisan make:controller messageController --resource --model=Message

-- php artisan make:migration create_file_table --create=file
-- php artisan make:controller fileController --resource --model=File
