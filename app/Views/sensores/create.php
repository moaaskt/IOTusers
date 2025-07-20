<h2>Novo Sensor</h2>
<form method="post" action="/sensores/store">
    <input type="text" name="nome" placeholder="Nome" required><br>
    <input type="text" name="tipo" placeholder="Tipo"><br>
    <input type="number" step="0.01" name="valor" placeholder="Valor"><br>
    <select name="status">
        <option value="ativo">Ativo</option>
        <option value="inativo">Inativo</option>
    </select><br>
    <button type="submit">Salvar</button>
</form>
