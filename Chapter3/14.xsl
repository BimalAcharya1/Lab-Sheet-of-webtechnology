<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:template match="/">
        <html>
        <head>
            <title>Book Catalog</title>
            <style>
                table {
                    border-collapse: collapse;
                    width: 100%;
                }
                th {
                    background-color: lightblue;
                    padding: 8px;
                    border: 1px solid black;
                }
                td {
                    padding: 8px;
                    border: 1px solid black;
                }
            </style>
        </head>
        <body>
            <h2>Book Catalog</h2>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Price</th>
                    <th>Publish Date</th>
                    <th>Description</th>
                </tr>
                <xsl:for-each select="catalog/book">
                    <tr>
                        <td><xsl:value-of select="@id"/></td>
                        <td><xsl:value-of select="author"/></td>
                        <td><xsl:value-of select="title"/></td>
                        <td><xsl:value-of select="genre"/></td>
                        <td><xsl:value-of select="price"/></td>
                        <td><xsl:value-of select="publish_date"/></td>
                        <td><xsl:value-of select="description"/></td>
                    </tr>
                </xsl:for-each>
            </table>
        </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
