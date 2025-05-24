<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">

    <xsl:output method="xml" indent="yes"/>

    <xsl:template match="/products">
        <new-products>
            <xsl:for-each select="product[quantity &gt;= 10]">
                <xsl:sort select="price" data-type="number" order="descending"/>
                <xsl:variable name="categoryName" select="category"/>
                <xsl:if test="not(preceding-sibling::product[category = $categoryName])">
                    <category name="{$categoryName}">
                        <xsl:for-each select="../product[category = $categoryName and quantity &gt;= 10]">
                            <product productname="{productname}">
                                <price><xsl:value-of select="price"/></price>
                                <quantity><xsl:value-of select="quantity"/></quantity>
                                <total-price>
                                    <xsl:value-of select="price * quantity"/>
                                </total-price>
                            </product>
                        </xsl:for-each>
                    </category>
                </xsl:if>
            </xsl:for-each>
        </new-products>
    </xsl:template>

</xsl:stylesheet>