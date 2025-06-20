<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:output method="html" indent="yes"/>

  <xsl:template match="/books">
    <html>
      <head>
        <title>Book List</title>
        <style>
          body {
            font-family: Arial, sans-serif;
            margin: 20px;
          }
          h1 {
            font-size: 2em;
            margin-bottom: 20px;
          }
          table {
            width: 80%; /* Adjust width as per image visual */
            border-collapse: collapse;
            margin-top: 20px;
            border: 2px solid #333; /* Darker border for the whole table */
          }
          th, td {
            border: 1px solid #999; /* Lighter border for cells */
            padding: 8px;
            text-align: left;
          }
          th {
            background-color: #f2f2f2;
            font-weight: bold;
          }
        </style>
      </head>
      <body>
        <h1>Book List</h1>
        <table>
          <thead>
            <tr>
              <th>Title</th>
              <th>Author</th>
              <th>Publisher</th>
              <th>Edition</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>
            <xsl:for-each select="book">
              <tr>
                <td><xsl:value-of select="title"/></td>
                <td><xsl:value-of select="author"/></td>
                <td><xsl:value-of select="publisher"/></td>
                <td><xsl:value-of select="edition"/></td>
                <td><xsl:value-of select="price"/></td>
              </tr>
            </xsl:for-each>
          </tbody>
        </table>
      </body>
    </html>
  </xsl:template>

</xsl:stylesheet>