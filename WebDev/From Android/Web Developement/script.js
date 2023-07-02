const sql = require('mysql')
function connect() {
const connection = mysql.createConnection({
  host: '127.0.0.1',
  user: 'root',
  password: 'root',
  database: 'testdb'
});
alert(conn)
connection.connect((err) => {
  if (err) throw err;
  console.log('Connected!');
});
}
