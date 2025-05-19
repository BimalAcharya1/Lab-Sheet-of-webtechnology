<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <head>
                <title>XML to XSLT Example</title>
                <style>
                    body { font-family: Arial, sans-serif; }
                    h1 { color: white; background-color: green; padding: 10px; text-align: center; }
                    .section-title { color: green; font-weight: bold; font-size: 18px; }
                    .topics li:nth-child(1) { color: green; }
                    .topics li:nth-child(2) { color: red; }
                    .topics li:nth-child(3) { color: blue; }
                    .topics li:nth-child(4) { color: yellow; }
                </style>
            </head>
            <body>
                <h1><xsl:value-of select="content/header"/></h1>
                <xsl:for-each select="content/sections/section">
                    <div class="section">
                        <div class="section-title"><xsl:value-of select="@name"/></div>
                        <ul class="topics">
                            <xsl:for-each select="topic">
                                <li><xsl:value-of select="."/></li>
                            </xsl:for-each>
                        </ul>
                    </div>
                </xsl:for-each>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>