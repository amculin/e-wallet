## Configuration

1. Fill the DB_DATABASE env value with your database name, for example, db_ewallet.
2. Add this to your env file:
   ```
   PAYMENT_URL=https://mocki.io/v1/e6334ce6-e974-49eb-bd8a-6ad54b4dba59
   DISPLAY_PER_PAGE=5
   ```
3. Run DB Migration and Seeder
   ```
   php artisan migrate
   php artisan db:seed
   ```
   if there is no data inserted, you may try to run DB Seeders one by one
   ```
   php artisan db:seed --class=UserSeeder
   php artisan db:seed --class=RefBankSeeder
   php artisan db:seed --class=UserAccountSeeder
   php artisan db:seed --class=WalletSeeder
   php artisan db:seed --class=TransactionSeeder
   ```
4. Run the application
   `php artisan serve`

## Route List

There are some routes provided, each detail can be seen by importing `sample-request-collection.har` into your API Client Software.
1. Auth
   - Login            **POST** `http://yourdomain/api/login`
   - Logout           **POST** `http://yourdomain/api/logout`
2. Wallet
   - Balance Check    **POST** `http://yourdomain/api/wallet`
   - Deposit          **POST** `http://yourdomain/api/wallet/deposit`
   - Withdrawal       **POST** `http://yourdomain/api/wallet/withdrawal`
   - Purchase         **POST** `http://yourdomain/api/wallet/purchase`
3. Transaction
   - List             **GET** `http://yourdomain/api/transaction`
